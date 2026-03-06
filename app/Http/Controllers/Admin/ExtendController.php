<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extend;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ExtendController extends Controller
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
            $query = Extend::query()->where('shop_id', $shop_id);
            $shop = Shop::find($shop_id);
        } else {
            $query = Extend::query();

            if ($request->has('shop') && $request->query('shop')) {
                $shop_slug = $request->query('shop');
                $query->whereHas('shop', function ($query) use ($shop_slug) {
                    $query->where('slug', $shop_slug);
                });
            }
        }
        
        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $extends = $query->skip($skip)
            ->take($limit)
            ->orderBy('id', 'asc')->get();

        return view('admin.extend.index', [
            'extends' => $extends,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
            'shops' => $is_shop_manager ? null : Shop::whereNot('slug', 'touchvip')->whereNot('slug','headquarter')->orderBy('rank', 'asc')->get(),
            'shop' => $is_shop_manager ? $shop : null,
        ]);
    }

    public function create(Request $request): View
    {
        $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        if ($is_shop_manager) {
            $shop_id = $request->user()->shops->first()->id;
            $shop = Shop::find($shop_id);
        }

        return view('admin.extend.create', [
            'shops' => $is_shop_manager ? null : Shop::whereNot('slug', 'touchvip')->whereNot('slug','headquarter')->orderBy('rank', 'asc')->get(),
            'shop' => $is_shop_manager ? $shop : null,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'extend_name' => 'required',
            'price' => 'required|numeric',
            'shop_id' => 'required',
        ]);

        $extend = Extend::firstOrCreate([
            'extend' => request('extend_name'),
            'price' => request('price'),
            'shop_id' => request('shop_id'),
            'description' => request('description'),
        ]);

        return redirect('/admin/extend/');
    }

    /**
     * Display the specified diary.
     */
    public function show(Request $request, string $id): View
    {
        $extend = Extend::find($id);
        // $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        // if ($is_shop_manager) {
        //     $shop_id = $request->user()->shops->first()->id;
        //     $shop = Shop::find($shop_id);
        // }
        $shop=Shop::find($extend->shop_id);
        return view('admin.extend.detail', [
            'extend' => $extend,
            'shop' => $shop,
            // 'shops' => $is_shop_manager ? null : Shop::all(),
            // 'shop' => $is_shop_manager ? $shop : null,
        ]);
    }

    /**
     * Update the specified review.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'extend_name' => 'required',
            'price' => 'required|numeric',
            'shop_id' => 'required',
        ]);

        $extend = Extend::find($id);
        $extend->extend = request('extend_name');
        $extend->price = request('price');
        $extend->shop_id = request('shop_id');
        $extend->description = request('description');
        $extend->save();

        return redirect('/admin/extend');
    }

    public function destroy(string $id): RedirectResponse
    {
        $extend = Extend::find($id);
        $extend->delete();

        return redirect('/admin/extend')->with('success', __('message.admin_extend_delete_success'));
    }
}
