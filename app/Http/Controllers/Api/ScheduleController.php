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
class ScheduleController extends Controller
{
    private const DEFAULT_LIMIT = 30;

    public function index()
    {
        return view('admin.schedule.index');
    }

    public function showCastsSchedule(Request $request): JsonResponse
    {
        try {
            Log::info('リクエストデータ:', $request->all());

            if (!$request->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'JSONリクエストが必要です'
                ], 400);
            }

            $user = Auth::user();
            Log::info($user);
            $date = $request->input('date') ? Carbon::parse($request->input('date')) : Carbon::today();
            $tomorrow = $date->copy()->addDays(1);

            $is_public = $request->input('public') !== null ? (bool)$request->input('public') : true;

            $query = Cast::where('is_public',1)
            ->whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)
            ->whereNot('shop_id', Shop::where('slug', 'headquarter')->first()->id);
            if ($request->input('castName')) {
                Log::Info("castName");
                $query->where('name', 'like', '%' . $request->input('castName') . '%');
            }
            // if ($request->input('shop')) {
            //     $shop = $request->input('shop');
            //     if ($shop != "") {
            //         $query->whereHas('shop', function ($query) use ($shop) {
            //             $query->where('slug', $shop);
            //         });
            //     }
            // }
            // dd($user->hasRole('admin'));
            if ($user->hasRole('admin')) {
                // Log::Info('admin');
                if ($request->input('shop')) {
                    $shop = $request->input('shop');
                    if ($shop != "") {
                        $query->whereHas('shop', function ($query) use ($shop) {
                            $query->where('slug', $shop);
                        });
                    }
                }
            } else if ($user->hasRole('shop')) {
                switch ($user->email) {
                    case 'shizuku@plo-group.jp':
                        // Log::Info('shizuku');
                        $query->whereHas('shop', function ($query) {
                            $query->where('slug', 'shizuku');
                        });
                        break;
                    case 'miyabi@plo-group.jp':
                        $query->whereHas('shop', function ($query) {
                            $query->where('slug', 'miyabi');
                        });
                        break;
                    case 'yosuke@plo-group.jp':
                        $query->whereHas('shop', function ($query) {
                            $query->where('slug', 'yosuke');
                        });
                        break;
                    case 'pussycat@plo-group.jp':
                        $query->whereHas('shop', function ($query) {
                            $query->where('slug', 'pussycat');
                        });
                        break;
                    case 'en@plo-group.jp':
                        $query->whereHas('shop', function ($query) {
                            $query->where('slug', 'maki');
                        });
                        break;
                    case 'siroganeze@plo-group.jp':
                        $query->whereHas('shop', function ($query) {
                            $query->where('slug', 'siroganeze');
                        });
                        break;
                    case 'lovestory@plo-group.jp':
                        $query->whereHas('shop', function ($query) {
                            $query->where('slug', 'lovestory');
                        });
                        break;
                }
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
                ->orderByRaw('(casts.rank IS NULL) ASC, casts.rank ASC')
                ->get();
            $date_tmp = Carbon::parse($date->toDateTimeString())->toDateString();
            $attendances = Attendance::where('is_public', $is_public)
                ->whereRaw('DATE(start_datetime) >= ?', [$date_tmp])
                ->whereRaw('DATE(end_datetime) <= ?', [$date_tmp])
                ->get();

            $reservations = Reservation::whereIn('attendance_id', $attendances->pluck('id'))
                ->get();

            Log::info('レスポンスデータ:', [
                'casts_count' => $casts->count(),
                'attendances_count' => $attendances->count(),
                'reservations_count' => $reservations->count(),
                'is_public' => $is_public,
                'date' => $date
            ]);

            return response()->json([
                'status' => 'success',
                'casts' => $casts,
                'attendances' => $attendances,
                'reservations' => $reservations,
                'page' => $page,
                'limit' => $limit,
                'skip' => $skip,
                'pages' => $pages,
                'total' => $total,
                'date' => $date->toDateString(),
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
    public function updateReservationTime(Request $request): JsonResponse
    {
        if ( !$request->expectsJson() ){
            abort(404);
        }
        Log::info($request->all());
        $date = $request->input('date');
        // $cast_id = $request->input('cast_id');
        $attendance_id = $request->input('attendance_id');
        // $startTime_working = $request->input('startTime_working');
        // $endTime_working = $request->input('endTime_working');
        $startTime_form = $request->input('startTime_form');
        $endTime_form = $request->input('endTime_form');
        // $attendance_public = $request->input('attendance_public');
        $start_date = Carbon::createFromDate($date);
        $end_date = Carbon::createFromDate($date);
        $startTime = $start_date->setTimeFromTimeString($startTime_form);
        $endTime = $end_date->setTimeFromTimeString($endTime_form);

        $reservation = Reservation::where('attendance_id', $attendance_id)->where(function($query) use ($startTime,$endTime){
            $query->where(function ($q) use ($startTime){
                $q->where('start_time', '<=', $startTime)->where('end_time', '>', $startTime);
            })->orWhere(function ($q) use ($endTime){
                $q->where('start_time', '<', $endTime)->where('end_time', '>=', $endTime);
            });
        })->get();

        if ($reservation->count() > 0){
            return response()->json(['status' => 'error', 'message' => 'すでに予約時間が登録されています']);
        }

        $reservation = new Reservation();
        // $reservation->cast_id = $cast_id;
        $reservation->attendance_id = $attendance_id;
        $reservation->start_time = Carbon::parse($startTime);
        $reservation->end_time = Carbon::parse($endTime);
        $reservation->save();
        return response()->json(['status' => 'success', 'reservation_id' => $reservation->id]);
    }
    public function deleteReservationTime(Request $request): JsonResponse
    {
        if ( !$request->expectsJson() ){
            abort(404);
        }
        Log::info($request->all());
        $reservation_id = $request->input('reservation_id');
        $reservation = Reservation::find($reservation_id);
        $reservation->delete();
        return response()->json(['status' => 'success', 'reservation_id' => $reservation_id]);
    }

    public function getCastsSchedule(Request $request): JsonResponse
    {
        Log::info($request->all());

        $date = $request->input('date');
        $shopID = $request->input('shopID');
        $page = $request->input('page');
        $limit = $request->input('limit');
        $skip = $request->input('skip');
        $pages = $request->input('pages');
        $total = $request->input('total');


        $query = Attendance::leftJoin('casts', 'attendances.cast_id', '=', 'casts.id')
        ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
        ->where('casts.is_public', 1)
        ->where('attendances.is_public', 1)
        ->whereRaw('DATE(attendances.start_datetime) = ?', [$date]);

        if ($shopID != ""){
            $query->where('casts.shop_id', $shopID);
        }

        $total = $query->count();
        $page = $request->input('page') ? (int) $request->input('page') : 1;
        $limit = $request->input('limit') ? (int) $request->input('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $casts = $query->selectRaw("
            attendances.id as attendance_id,
            DATE_FORMAT(attendances.start_datetime, '%H:%i') as start_datetime,
            DATE_FORMAT(attendances.end_datetime, '%H:%i') as end_datetime,
            casts.name as cast_name,
            casts.id as cast_id,
            casts.shop_id as shop_id,
            casts.gallery_1 as gallery_1,
            casts.age as age,
            casts.height as height,
            casts.bust as bust,
            casts.waist as waist,
            casts.hip as hip,
            casts.appeal_point as appeal_point,
            shops.name as shop_name,
            shops.slug as shop_slug
            ") // 必要に応じて
        ->skip($skip)
        ->take($limit)
        ->get();


        return response()->json(['status' => 'success', 'casts' => $casts, 'page' => $page, 'limit' => $limit, 'skip' => $skip, 'pages' => $pages, 'total' => $total, 'date' => $date, 'shopID' => $shopID]);
    }

    public function getCastsScheduleShop(Request $request): JsonResponse
    {
        Log::info($request->all());

        $date = $request->input('date');
        $shopID = $request->input('shopID');
        $page = $request->input('page');
        $limit = $request->input('limit');
        $skip = $request->input('skip');
        $pages = $request->input('pages');
        $total = $request->input('total');


        $query = Attendance::leftJoin('casts', 'attendances.cast_id', '=', 'casts.id')
        ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
        ->where('casts.is_public', 1)
        ->where('attendances.is_public', 1)
        ->whereRaw('DATE(attendances.start_datetime) = ?', [$date]);

        $query->where('casts.shop_id', $shopID);

        $total = $query->count();
        $page = $request->input('page') ? (int) $request->input('page') : 1;
        $limit = $request->input('limit') ? (int) $request->input('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $casts = $query->selectRaw("
            attendances.id as attendance_id,
            DATE_FORMAT(attendances.start_datetime, '%H:%i') as start_datetime,
            DATE_FORMAT(attendances.end_datetime, '%H:%i') as end_datetime,
            casts.name as cast_name,
            casts.id as cast_id,
            casts.shop_id as shop_id,
            casts.gallery_1 as gallery_1,
            casts.age as age,
            casts.height as height,
            casts.bust as bust,
            casts.waist as waist,
            casts.hip as hip,
            casts.appeal_point as appeal_point,
            shops.name as shop_name,
            shops.slug as shop_slug
            ") // 必要に応じて
        ->skip($skip)
        ->take($limit)
        ->get();


        return response()->json(['status' => 'success', 'casts' => $casts, 'page' => $page, 'limit' => $limit, 'skip' => $skip, 'pages' => $pages, 'total' => $total, 'date' => $date ]);
    }

    public function getDiaryDetail(Request $request): JsonResponse
    {
        Log::info($request->all());
        $date = $request->input('date');
        $cast_id = $request->input('cast_id');
        $shop_id = $request->input('shop_id');
        $page = $request->input('page');
        $limit = $request->input('limit');
        $skip = $request->input('skip');
        $pages = $request->input('pages');
        $total = $request->input('total');

        $query = Diary::where('cast_id', $cast_id)->where('is_public', 1)
        // ->whereDate('created_at', '=', Carbon::now())
        ->whereDate('created_at', '=', $date);

        $total = $query->count();
        $page = $request->input('page') ? (int) $request->input('page') : 1;
        $limit = $request->input('limit');
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $diarys = $query->skip($skip)
            ->take($limit)
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->selectRaw("
                DATE_FORMAT(created_at, '%Y-%m-%d %H:%i') as created_datetime,
                subject,
                photo,
                body
            ")
            ->get();
        // dd($diarys);
        $total_diarys = Diary::where('cast_id', $cast_id)->where('is_public', 1)->whereNull('deleted_at')
        ->selectRaw("
            DATE_FORMAT(created_at, '%Y-%m-%d') as total_date
        ")
        ->groupBy('total_date')
        ->orderBy('created_at', 'desc')
        ->get();

        $working = Attendance::where('cast_id', $cast_id)->where('is_public', 1)
        ->whereDate('start_datetime', '<=', $date)
        ->whereDate('end_datetime', '>=', $date)
        ->count();
        // dd($working);
        $reservation = 0;
        if ($working > 0) {
            $workID = Attendance::where('cast_id', $cast_id)->where('is_public', 1)
            ->whereDate('start_datetime', '<=', Carbon::now())
            ->whereDate('end_datetime', '>=', Carbon::now())
            ->first()->id;
            $reservation = Reservation::where('attendance_id', $workID)
            ->count();
        } else {
            $reservation = 0;
        }

        return response()->json(['status' => 'success', 'diarys' => $diarys, 'working' => $working, 'reservation' => $reservation, 'page' => $page, 'limit' => $limit, 'skip' => $skip, 'pages' => $pages, 'total' => $total, 'date' => $date, 'cast_id' => $cast_id, 'shop_id' => $shop_id, 'total_diarys' => $total_diarys]);
    }
}
