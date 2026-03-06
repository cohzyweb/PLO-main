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
use Illuminate\Support\Facades\DB;
use App\Models\Diary;

class CastController extends Controller
{
    private const DEFAULT_LIMIT = 30;

    public function index()
    {
        return view('admin.cast.sortindex');
    }

    public function getSortedCast(Request $request): JsonResponse
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
            $date = $request->input('date') ? Carbon::parse($request->input('date'))->toDateString() : Carbon::today()->toDateString();
            $shop = $request->input('shop');
            $is_public = $request->input('public') !== null ? (bool)$request->input('public') : true;

            if ($user->hasRole('admin')) {
                $shopId = $shop;
            } else if ($user->hasRole('shop')) {
                $shopId = \DB::table('shop_user')
                    ->where('user_id', $user->id)
                    ->value('shop_id');
                Log::info($shopId);
            }

            if ($shopId) {
                $casts = Cast::where('casts.shop_id', $shopId)
                    ->where('casts.is_public', 1)
                    ->orderByRaw('(casts.rank IS NULL) ASC, casts.rank ASC')
                    ->get();

                Log::info('レスポンスデータ:', [
                    'casts_count' => $casts->count(),
                ]);

                return response()->json([
                    'status' => 'success',
                    'casts' => $casts,
                    'date' => $date,
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Shop not found'
                ], 404);
            }
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

    public function updateRanking(Request $request): JsonResponse
    {
        
        if (!$request->expectsJson()) {
            return response()->json([
                'status' => 'error',
                'message' => 'JSONリクエストが必要です'
            ], 400);
        }
        
        $rankingData = $request->input("allCastRanking");
        Log::info('リクエストデータ:', $rankingData);

        if (!is_array($rankingData)) {
            return response()->json([
                'status' => 'error',
                'message' => '不正なデータ形式です'
            ], 400);
        }

        foreach ($rankingData as $item) {
            if (isset($item['id'], $item['rank'])) {
                Cast::where('id', $item['id'])->update(['rank' => $item['rank']]);
                Log::info('update rank', $item);
            }
        }

        return response()->json(['status' => 'success']);
    }
}