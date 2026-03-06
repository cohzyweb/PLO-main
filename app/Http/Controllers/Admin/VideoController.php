<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
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
            $query = Video::query()->whereHas('cast', function ($query) use ($shop_id) {
                $query->whereHas('shop', function ($query) use ($shop_id) {
                    $query->where('id', $shop_id);
                });
            });
        } else {
            $query = Video::query();
        }
        
        if ($request->has('cast') && $request->query('cast')) {
            $cast = '%' . $request->query('cast') . '%';
            $query->whereHas('cast', function ($query) use ($cast) {
                $query->where('name', 'like', $cast);
            });
        }

        if ($request->has('shop') && $request->query('shop')) {
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

        $videos = $query->skip($skip)
            ->take($limit)
            ->orderBy('created_at', 'desc')->get();

        return view('admin.video.index', [
            'videos' => $videos,
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
        $video = Video::find($id);

        $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        if ($is_shop_manager) {
            $my_shop_id = $request->user()->shops->first()->id;
            if ($video->cast->shop->id !== $my_shop_id) {
                abort(403);
            }
        }

        return view('admin.video.detail', [
            'video' => $video,
        ]);
    }

    /**
     * Destroy the specified video.
     * Video Cannot be deleted.
     */
    // public function destroy(string $id): RedirectResponse
    // {
    //     $video = Video::find($id);
    //     $video->delete();

    //     return redirect('admin/video');
    // }

    /**
     * Publish the specified diary.
     */

    public function publish(Request $request, string $id): RedirectResponse
    {
        Log:info("111");
        $video = Video::find($id);
        $video->is_public = true;
        $video->save();

        return redirect('/admin/video');
    }

    /**
     * Unpublish the specified video.
     */
    public function unpublish(string $id): RedirectResponse
    {
        Log:info("222");
        $video = Video::find($id);
        $video->is_public = false;
        $video->save();

        return redirect('/admin/video');
    }
}
