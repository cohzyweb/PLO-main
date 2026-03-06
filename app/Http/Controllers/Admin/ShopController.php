<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Carbon\Carbon;

class ShopController extends Controller
{
    /**
     * Display a listing of the shop.
     */
    public function index(Request $request): View
    {
        return view('admin.shop.index', [
            'shops' => Shop::all(),
        ]);
    }

    /**
     * Display the specified shop.
     */
    public function show(string $id): View
    {
        $shop = Shop::find($id);
        return view('admin.shop.detail', [
            'shop' => $shop,
        ]);
    }

    /**
     * Update the specified cast.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'shop_name' => 'required',
            'postcode' => 'required',
            'address1' => 'required',
            'tel' => 'required',
            'email' => 'required|email',
        ]);

        $shop = Shop::find($id);

        $shop->name = $request->shop_name;
        $shop->postcode = $request->postcode;
        $shop->address1 = $request->address1;
        $shop->address2 = $request->address2;
        $shop->tel = $request->tel;
        $shop->email = $request->email;
        // $shop->map = $request->map;
        // $shop->folder = $request->folder;
        // $shop->video_folder = $request->video_folder;
        $shop->open_start = $request->open_start;
        $shop->open_end = $request->open_end;
        $shop->memo = $request->memo;
        $shop->save();

        return redirect('/admin/shop/' . $shop->id);
    }
}
