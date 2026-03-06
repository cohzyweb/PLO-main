<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diary;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DiaryController extends Controller
{
    const DEFAULT_LIMIT = 30;

    /**
     * Display a listing of the diary.
     */
    public function index(Request $request): View
    {
        $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        if ($is_shop_manager) {
            $shop_id = $request->user()->shops->first()->id;
            $query = Diary::query()->whereHas('cast', function ($query) use ($shop_id) {
                $query->whereHas('shop', function ($query) use ($shop_id) {
                    $query->where('id', $shop_id);
                });
            });
        } else {
            $query = Diary::query();
        }

        if ($request->has('cast')) {
            $cast = '%' . $request->query('cast') . '%';
            $query->whereHas('cast', function ($query) use ($cast) {
                $query->where('name', 'like', $cast);
            });
        }

        if ($request->has('shop')) {
            $shop = $request->query('shop');
            $query->whereHas('cast', function ($query) use ($shop) {
                $query->whereHas('shop', function ($query) use ($shop) {
                    $query->where('slug', $shop);
                });
            });
        }

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $diaries = $query->skip($skip)
            ->take($limit)
            ->orderBy('created_at', 'desc')->get();

        return view('admin.diary.index', [
            'diaries' => $diaries,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
            'shops' => Shop::all(),
        ]);
    }

    /**
     * Display the specified diary.
     */
    public function show(Request $request, string $id): View
    {
        $diary = Diary::find($id);

        $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        if ($is_shop_manager) {
            $my_shop_id = $request->user()->shops->first()->id;
            if ($diary->cast->shop->id !== $my_shop_id) {
                abort(403);
            }
        }

        return view('admin.diary.detail', [
            'diary' => $diary,
        ]);
    }

    /**
     * Destroy the specified diary.
     */
    public function destroy(string $id): RedirectResponse
    {
        $diary = Diary::find($id);
        $diary->delete();

        return redirect('admin/diary');
    }

    /**
     * Publish the specified diary.
     */
    public function publish(string $id): View
    {
        $diary = Diary::find($id);
        $diary->is_public = true;
        $diary->save();

        return view('admin.diary.detail', [
            'diary' => $diary,
        ]);
    }

    /**
     * Unpublish the specified diary.
     */
    public function unpublish(string $id): View
    {
        $diary = Diary::find($id);
        $diary->is_public = false;
        $diary->save();

        return view('admin.diary.detail', [
            'diary' => $diary,
        ]);
    }
}
