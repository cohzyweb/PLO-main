<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Diary;

class WorkController extends Controller
{
    private const DEFAULT_LIMIT = 30;

    public function index()
    {
        return view('admin.work.index');
    }

    public function showCastsSchedule(Request $request): JsonResponse
    {
        try {
            // Log::info('リクエストデータ:', $request->all());

            if (!$request->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'JSONリクエストが必要です'
                ], 400);
            }

            $user = Auth::user();
            $date = $request->input('date') ? Carbon::parse($request->input('date'))->startOfDay() : Carbon::today()->startOfDay();

            $endDate = $date->copy()->addDays(6)->endOfDay();
            $is_public = true;

            $query = Cast::where('is_public', 1)
            ->whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)
            ->whereNot('shop_id', Shop::where('slug', 'headquarter')->first()->id);

            $shop = $request->input('shop');
            if ($user->hasRole('admin')) {
                if ($shop) {
                    $query = Cast::where('shop_id', $shop);
                }
            } else if ($user->hasRole('shop')) {
                $shop_id = \DB::table('shop_user')
                    ->where('user_id', $user->id)
                    ->value('shop_id');
                $query = Cast::where('shop_id', $shop_id);
            }


            $total = $query->count();
            $page = $request->input('page') ? (int) $request->input('page') : 1;
            $limit = $request->input('limit') ? (int) $request->input('limit') : self::DEFAULT_LIMIT;
            $skip = ($page - 1) * $limit;
            $pages = ceil($total / $limit);

            $casts = $query->skip($skip)
                ->take($limit)
                // ->orderBy('created_at', 'desc')
                // ->orderBy('id', 'desc')
                ->where('is_public', 1)
                ->orderByRaw('(casts.rank IS NULL) ASC, casts.rank ASC')
                ->get(['id', 'name', 'gallery_1']);

            $dates = [];
            for ($i = 0; $i < 8; $i++) {
                $dates[$i] = $date->copy()->addDays($i)->toDateTimeString();
            }
            Log::info($dates);

            $result = [];
            foreach ($casts as $cast) {
                $castData = $cast->toArray();
                $castData['schedule'] = [];
                for ($i = 0; $i < 7; $i++) {
                    // Attendance for this cast on this day
                    $start_date = Carbon::createFromDate($dates[$i])->toDateString();
                    $end_date = Carbon::createFromDate($dates[$i])->toDateString();
                    // $attendance = Attendance::where('cast_id', 258)
                    $attendance = Attendance::where('cast_id', $cast->id)
                        ->where('is_public', 1)
                        ->whereDate('start_datetime', '>=', $start_date)
                        ->whereDate('end_datetime', '<=', $end_date)
                        ->first();
                    // dd($attendance);
                    $attendance_id = $attendance ? $attendance->id : null;
                    $reservation_count = 0;
                    if ($attendance_id) {
                        $reservation_count = Reservation::where('attendance_id', $attendance_id)->count();
                    }

                    $castData['schedule'][] = [
                        'date' => $dates[$i],
                        'attendance' => $attendance,
                        'reservation_count' => $reservation_count,
                    ];
                }
                $result[] = $castData;
            }

            Log::info($result);
            // dd($result);
            return response()->json([
                'status' => 'success',
                'casts' => $result,
                'page' => $page,
                'limit' => $limit,
                'skip' => $skip,
                'pages' => $pages,
                'total' => $total,
                'date_range' => [
                    'start' => $dates[0],
                    'end' => $dates[6],
                ],
            ]);

        } catch (\Exception $e) {
            Log::error('スケジュール取得エラー:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'データの取得中にエラーが発生しました: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateAttendanceTime(Request $request): JsonResponse
    {
        if ( !$request->expectsJson() ){
            abort(404);
        }
        Log::info($request->all());
        $attendance_id = $request->input('attendance_id');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $cast_id = $request->input('cast_id');
        $attendance_public = $request->input('attendance_public');

        $date = $request->input('date');
        $start_date = Carbon::createFromDate($date);
        $end_date = Carbon::createFromDate($date);
        $startTime_a = $start_date->setTimeFromTimeString($startTime);
        $endTime_b = $end_date->setTimeFromTimeString($endTime);
        Log::info($startTime_a);
        Log::info($endTime_b);
        if ($attendance_id == "" && $attendance_id == null){
            // $attendance = Attendance::where('cast_id', $cast_id)
            //     ->where('start_datetime >= ', $startTime_a->toDateString())
            //     ->where('end_datetime <= ', $endTime_b->toDateString())
            //     ->get();
            // if ($attendance->count() > 0){
            //     return response()->json(['status' => 'error', 'message' => 'すでに出勤時間が登録されています']);
            // }

            $attendance = new Attendance();
            $attendance->cast_id = $cast_id;
            $attendance->start_datetime = Carbon::parse($startTime_a);
            $attendance->end_datetime = Carbon::parse($endTime_b);
            $attendance->is_public = $attendance_public;
            $attendance->save();
        }else{
            $attendance = Attendance::find($attendance_id);
            $attendance->cast_id = $cast_id;
            $attendance->start_datetime = Carbon::parse($startTime_a);
            $attendance->end_datetime = Carbon::parse($endTime_b);
            $attendance->is_public = $attendance_public;
            $attendance->save();
        }
        return response()->json(['status' => 'success', 'attendance_id' => $attendance->id]);
    }

    public function deleteAttendance(Request $request): JsonResponse
    {
        if ( !$request->expectsJson() ){
            abort(404);
        }
        Log::info($request->all());

        $attendance_id = $request->input('attendance_id');
        Reservation::where('attendance_id', $attendance_id)->delete();
        $attendance = Attendance::find($attendance_id);
        $attendance->delete();

        return response()->json(['status' => 'success', 'attendance_id' => $attendance_id]);
    }
}