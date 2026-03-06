<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appoint;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class AppointController extends Controller
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
            $query = Appoint::query()->where('shop_id', $shop_id);
            $shop = Shop::find($shop_id);
        } else {
            $query = Appoint::query();

            if ($request->has('shop') && $request->query('shop')) {
                $shop_slug = $request->query('shop');
                $query->whereHas('shop', function ($query) use ($shop_slug) {
                    $query->where('slug', $shop_slug);
                });
            }
        }


        $appoints = $query->orderBy('id', 'asc')->get();

        return view('admin.appoint.index', [
            'appoints' => $appoints,
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

        return view('admin.course.create', [
            'shops' => $is_shop_manager ? null : Shop::all(),
            'shop' => $is_shop_manager ? $shop : null,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'course_name' => 'required',
            'price' => 'required|numeric',
            'shop_id' => 'required',
        ]);

        $course = CourseGroup::firstOrCreate([
            'course' => request('course_name'),
            'price' => request('price'),
            'shop_id' => request('shop_id'),
            'description' => request('description'),
        ]);

        return redirect('/admin/course/');
    }

    /**
     * Display the specified diary.
     */
    public function show(Request $request, string $id): View
    {
        $appoint = Appoint::find($id);
        $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        // if ($is_shop_manager) {
        //     $shop_id = $request->user()->shops->first()->id;
        //     $shop = Shop::find($shop_id);
        // }
        $shop = Shop::find($appoint->shop_id);
        // dd($shop);
        return view('admin.appoint.detail', [
            'appoint' => $appoint,
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
            'repeat_price' => 'required|numeric',
            'panel_price' => 'required|numeric',
            'shop_id' => 'required',
        ]);

        $appoint = Appoint::find($id);
        $appoint->repeat_price = request('repeat_price');
        $appoint->panel_price = request('panel_price');
        $appoint->shop_id = request('shop_id');
        $appoint->save();

        return redirect('/admin/appoint');
    }
}
