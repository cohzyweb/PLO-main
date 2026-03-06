<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiaryResource;
use App\Models\Cast;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class TouchVipDiaryController extends Controller
{
    const LIMIT = 5;

    /**
     * Display the specified diary.
     */
    public function show(string $slug): View
    {
        $diary = Diary::where('slug', $slug)->first();

        if ($diary === null || !$diary->is_public) {
            abort(404);
        }

        $cast_id = $diary->cast->id;
        $prev = Diary::where('cast_id', $cast_id)
            ->where('created_at', '>', $diary->created_at)
            ->orderBy('created_at', 'asc')
            ->first();
        $next = Diary::where('cast_id', $cast_id)
            ->where('created_at', '<', $diary->created_at)
            ->orderBy('created_at', 'desc')
            ->first();

        $archives = Diary::where('cast_id', $cast_id)->get();

        return view('public.touchvip.diary.detail', [
            'diary' => $diary,
            'prev' => $prev ?? null,
            'next' => $next ?? null,
            'archives' => $archives,
        ]);
    }

    /**
     * Display the diaries.
     */
    public function index(Request $request, string $cast_id, string $month): View
    {
        if (preg_match('/^[0-9]{4}-[0-9]{2}$/', $month) !== 1) {
            abort(404);
        }

        $diaries_query = Diary::where('cast_id', $cast_id)
            ->where('created_at', 'like', "$month%")
            ->where('is_public', true);

        $total = $diaries_query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $skip = ($page - 1) * self::LIMIT;
        $pages = ceil($total / self::LIMIT);

        $diaries = $diaries_query->skip($skip)
            ->take(self::LIMIT)
            ->orderBy('created_at', 'desc')
            ->get();

        $cast = Cast::find($cast_id);

        $archives = Diary::where('cast_id', $cast_id)
            ->where('is_public', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('public.touchvip.diary.index', [
            'diaries' => $diaries,
            'page' => $page,
            'limit' => self::LIMIT,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
            'cast' => $cast,
            'archives' => $archives,
        ]);
    }

    /**
     * Getting the diaries API for WordPress site.
     */
    public function get(string $cast_id) {
		Log::Info('wordpress');
        $diaries = Diary::where('cast_id', $cast_id)
            ->where('is_public', true)
            ->take(4)
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json(
            DiaryResource::collection($diaries), 200
        );
    }
}
