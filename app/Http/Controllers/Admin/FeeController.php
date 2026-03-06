<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Event;
use App\Models\Shop;

class FeeController extends Controller
{
    const DEFAULT_LIMIT = 30;
    /**
     * Display a listing of the event.
     */
    public function index(Request $request): View
    {
      return view('admin.fee.index', [
          'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank', 'asc')->get(),
      ]);
    }

    /**
     * Display the specified event.
     */
    public function show(Request $request, string $id): View
    {
      // $event = Event::findOrFail($id);
      // dd($event);
        return view('admin.fee.detail', [
            'shop' => Shop::findOrFail($id),
        ]);
    }

    /**
     * Update the specified event.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
      // $validated = $request->validate([
      //   'cast_name' => 'required',
      //   'shop_id' => 'required',
      // ]);
      // dd($request);
      $shop = Shop::find($id);
      $shop->fee = $request->fee_content;
      $shop->save();


      return redirect('/admin/fee')->with('success', __('message.admin_fee_update_success'));
    }

}

?>