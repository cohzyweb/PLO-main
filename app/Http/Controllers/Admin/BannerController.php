<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Banner;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;

class BannerController extends Controller
{
  
    const DEFAULT_LIMIT = 30;
    /**
     * Display a listing of the banner.
     */
    public function index(Request $request): View
    {
        // $banners = Banner::where('is_public', true)->with('shop')->get();

        $query = Banner::query();
        if ( $request->has('shop') && $request->query('shop') !== null) {
          $shop = $request->query('shop');
          $query -> whereHas('shop', function ($query) use ($shop) {
              $query->where('slug', $shop);
          });
  
        }
  
        if ($request->has('public') && $request->query('public') !== null) {
          $query->where('is_public', $request->query('public') ? true : false);
        }
  
        $total = $query->count();
  
        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        return view('admin.banner.index', [
          'banners' => $query->with('shop')->orderBy('id', 'asc')->get(),
          'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
          'page' => $page,
          'limit' => $limit,
          'skip' => $skip,
          'total' => $total,
          'pages' => $pages,
        ]);
    }

    /**
     * Create a banner.
     */
    public function create(Request $request): View
    {
        return view('admin.banner.create', [
          'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
        ]);
    }

    /**
     * Store a banner.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'file_1' => 'required',
            'title' => 'required',
            'shop_id' => 'required',
        ],[
            'file_1.required' => __('message.thumbnail_required'),
            'title.required' => __('message.title_required'),
            'shop_id.required' => __('message.shop_id_required'),
        ]);

        $banner = Banner::Create([
            'is_public' => $request->is_public ? true : false,
            'link_url' => $request->link_url,
            'title' => $request->title,
            'shop_id' => $request->shop_id,
        ]);

        // dd($request);
        $file_path = "banner/{$banner->id}";
        $file1 = $request->file('file_1');
        $banner->thumbnail = $file1 ? $file1->store($file_path, 'public') : null;
        $banner->save();

        return redirect('/admin/banner')->with('success', __('message.admin_banner_create_success'));
    }
    /**
     * Display the specified cast.
     */
    public function show(Request $request, string $id): View
    {
        return view('admin.banner.detail', [
            'banner' => Banner::findOrFail($id),
            'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
        ]);
    }

    /**
     * Update the specified cast.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // dd($request);
        // $validated = $request->validate([
        //     'path_1' => 'required',
        //     'path_2' => 'required',
        // ]);
        $file_path = "banner/{$id}";
        $file1 = $request->file('file_1');
        if ( ($file1 == null && $request->path_1 == null) ) {
            return redirect()->back()->with('error', __('message.banner_thumbnail_required'));
        }
        $request->validate([
            'title' => 'required',
            'shop_id' => 'required',
        ],[
            'title.required' => __('message.title_required'),
            'shop_id.required' => __('message.shop_id_required'),
        ]);
        $banner = Banner::find($id);
        $banner->thumbnail = $file1 ? $file1->store($file_path, 'public') : $request->path_1;
        $banner->is_public = $request->is_public ? true : false;
        $banner->link_url = $request->link_url;
        $banner->title = $request->title;
        $banner->shop_id = $request->shop_id;
        $banner->save();

        return redirect(route('admin.banner.index'))->with('success', __('message.admin_banner_update_success'));
    }

    /**
     * Destroy the specified cast.
     */
    public function destroy(string $id): RedirectResponse
    {
        $banner = Banner::find($id);
        $banner->delete();

        return redirect(route('admin.banner.index'))->with('success', __('message.admin_banner_delete_success'));
    }
}