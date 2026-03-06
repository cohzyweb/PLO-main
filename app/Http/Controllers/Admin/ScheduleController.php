<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Option;
use App\Models\Personality;
use App\Models\Shop;
use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    const DEFAULT_LIMIT = 30;
    public function index(Request $request): View
    {
        // $query = Cast::where('is_public', true);
        // Log::Info(Auth::user()->name);
        // $total = $query->count();

        // $page = $request->query('page') ? (int) $request->query('page') : 1;
        // $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        // $skip = ($page - 1) * $limit;
        // $pages = ceil($total / $limit);
        // $casts = $query->skip($skip)
        //     ->take($limit)
        //     ->orderBy('created_at', 'desc')
        //     ->orderBy('id', 'desc')
        //     ->get();
        // $day = $request->query('day') ? (int) $request->query('day') : Carbon::today()->toDateString();
        // $public = $request->input('public') ? (int) $request->input('public') : true;
        // $attendances = Attendance::where('is_public', $public)
        // ->whereRaw('DATE(start_datetime) <= ?', [$day])
        // ->whereRaw('DATE(end_datetime) >= ?', [$day])
        // ->get();

        // $reservations = Reservation::whereIn('attendance_id', $attendances->pluck('id'))
        // ->get();
        // dd(compact('casts', 'attendances', 'reservations'));
        // dd($token);
        $token =Auth::user()->createToken('schedule')->plainTextToken;
        return view('admin.schedule.index',[
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get(),
            'token'=> $token,
            // 'token' => $token,
            // 'casts' => $casts,
            // 'attendances' => $attendances,
            // 'reservations' => $reservations,
            // 'page' => $page,
            // 'limit' => $limit,
            // 'skip' => $skip,
            // 'pages' => $pages,
        ]);
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

            $user = auth()->user();
            Log::info($user);
            $date = $request->input('date') ? Carbon::parse($request->input('date'))->toDateString() : Carbon::today()->toDateString();
            $is_public = $request->input('public') !== null ? (bool)$request->input('public') : true;

            $query = Cast::query();
            if ($request->input('castName')) {
                $query->where('name', 'like', '%' . $request->input('castName') . '%');
            }
            if ($request->input('shop')) {
                $shop = $request->input('shop');
                if ($shop != "") {
                    $query->whereHas('shop', function ($query) use ($shop) {
                        $query->where('slug', $shop);
                    });
                }
            }

            // if ($user->hasRole('admin')) {
            //     if ($request->input('shop')) {
            //         $shop = $request->input('shop');
            //         if ($shop != "") {
            //             $query->whereHas('shop', function ($query) use ($shop) {
            //                 $query->where('slug', $shop);
            //             });
            //         }
            //     }
            // }else if ($user->hasRole('shop')) {
            //     switch ($user->email) {
            //         case 'shizuku@plo-group.jp':
            //             $query->whereHas('shop', function ($query) {
            //                 $query->where('slug', 'shizuku');
            //             });
            //             break;
            //         case 'miyabi@plo-group.jp':
            //             $query->whereHas('shop', function ($query) {
            //                 $query->where('slug', 'miyabi');
            //             });
            //             break;
            //         case 'yosuke@plo-group.jp':
            //             $query->whereHas('shop', function ($query) {
            //                 $query->where('slug', 'yosuke');
            //             });
            //             break;
            //         case 'pussycat@plo-group.jp':
            //             $query->whereHas('shop', function ($query) {
            //                 $query->where('slug', 'pussycat');
            //             });
            //             break;
            //         case 'en@plo-group.jp':
            //             $query->whereHas('shop', function ($query) {
            //                 $query->where('slug', 'maki');
            //             });
            //             break;
            //         case 'shiroganeze@plo-group.jp':
            //             $query->whereHas('shop', function ($query) {
            //                 $query->where('slug', 'shiroganeze');
            //             });
            //             break;
            //         case 'lovestory@plo-group.jp':
            //             $query->whereHas('shop', function ($query) {
            //                 $query->where('slug', 'lovestory');
            //             });
            //             break;
            //         }
            //     }
            // }
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

            $attendances = Attendance::where('is_public', $is_public)
                ->whereRaw('DATE(start_datetime) <= ?', [$date])
                ->whereRaw('DATE(end_datetime) >= ?', [$date])
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
                'date' => $date
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
}