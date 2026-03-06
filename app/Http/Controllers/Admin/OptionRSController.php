<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OptionRS;
use App\Models\Option;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class OptionRSController extends Controller
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
            $query = OptionRS::query()->where('shop_id', $shop_id);
            $shop = Shop::find($shop_id);
        } else {
            $query = OptionRS::query();

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

        $options_rs = $query->skip($skip)
            ->take($limit)
            ->orderBy('id', 'asc')->get();

        return view('admin.option_rs.index', [
            'options_rs' => $options_rs,
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

        return view('admin.option_rs.create', [
            'shops' => $is_shop_manager ? null : Shop::whereNot('slug', 'touchvip')->whereNot('slug','headquarter')->orderBy('rank', 'asc')->get(),
            'shop' => $is_shop_manager ? $shop : null,
            'options' => Option::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'option_id' => 'required',
            'price' => 'required|numeric',
            'shop_id' => 'required',
        ]);

        $optionrs = OptionRS::firstOrCreate([
            'option_id' => request('option_id'),
            'price' => request('price'),
            'shop_id' => request('shop_id'),
        ]);

        return redirect('/admin/option_rs/');
    }

    /**
     * Display the specified diary.
     */
    public function show(Request $request, string $id): View
    {
        $optionrs = OptionRS::find($id);
        // $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        // if ($is_shop_manager) {
        //     $shop_id = $request->user()->shops->first()->id;
        //     $shop = Shop::find($shop_id);
        // }
        $shop=Shop::find($optionrs->shop_id);
        return view('admin.option_rs.detail', [
            'optionrs' => $optionrs,
            'options' => Option::all(),
            'shop' => $shop,
            // 'shops' => $is_shop_manager ? null : Shop::whereNot('slug', 'touchvip')->whereNot('slug','headquarter')->orderBy('rank', 'asc')->get(),
            // 'shop' => $is_shop_manager ? $shop : null,
        ]);
    }

    /**
     * Update the specified review.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'option_id' => 'required',
            'price' => 'required|numeric',
            'shop_id' => 'required',
        ]);

        $optionrs = OptionRS::find($id);
        $optionrs->option_id = request('option_id');
        $optionrs->price = request('price');
        $optionrs->shop_id = request('shop_id');
        $optionrs->save();

        return redirect('/admin/option_rs');
    }

    public function destroy(string $id): RedirectResponse
    {
        $optionrs = OptionRS::find($id);
        $optionrs->delete();

        return redirect('/admin/option_rs')->with('success', __('message.admin_option_rs_delete_success'));
    }
}
