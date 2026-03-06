<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Shop;
use App\Models\Review;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{

    public function createReview(Request $request): JsonResponse
    {
        $history = History::where('id', $request->input('history_id'))->first();
        Log::info($request->all());
        $review = new Review();
        $review->member_id = $request->input('member_id');
        $review->cast_id = $history->cast_id;
        $review->title = $request->input('title');
        $review->content = $request->input('content');
        $review->cast_point = $request->input('cast_point');
        $review->play_point = $request->input('play_point');
        $review->price_point = $request->input('price_point');
        $review->stuff_point = $request->input('stuff_point');
        $review->photo_point = $request->input('photo_point');
        $review->average_point = $request->input('average_point');
        $review->history_id = $request->input('history_id');
        $review->save();

        return response()->json(['status' => 'success' ] )  ;
    }

}