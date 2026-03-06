<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Pickup;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PickupController extends Controller
{
    /**
     * Display a listing of the pickup.
     */
    public function index(Request $request): View
    {
        $user = Auth::guard('web')->user();

        $query = Pickup::query();
        $shop_id = 0;
        if ($user->hasRole('admin')) {
            if ($request->has('shop')) {
                $shop_id = Shop::where('slug', $request->shop)->first()->id;
                $query->where('shop_id', Shop::where('slug', $request->shop)->first()->id);
            }else{
                $shop_id = Shop::where('slug', 'shizuku')->first()->id;
                $query->where('shop_id', Shop::where('slug', 'shizuku')->first()->id);
            }
        }else{
            $shop_user = DB::connection('mysql')->table('shop_user')->where('user_id', $user->id)->first();
            $shop_id = $shop_user->shop_id;
            $query->where('shop_id', $shop_id);
        }
        $shops = Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank', 'asc')->get();

        return view('admin.pickup.detail', [
            'shop' => Shop::findOrFail($shop_id),
            'casts' => Cast::where('shop_id', $shop_id)->where('is_public', 1)->get(),
            'pickups' => $query->get(),
            'shops' => $shops,
        ]);

        // return view('admin.pickup.index', [
        //     'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank', 'asc')->get(),
        // ]);
    }

    /**
     * Display the specified pickup.
     */
    public function show(Request $request, string $id): View
    {
        // $query = Pickup::query();
        // if ($request->has('shop')) {
        //     $query->where('shop_id', Shop::where('slug', $request->shop)->first()->id);
        // }else{
        //     $query->where('shop_id', Shop::where('slug', 'shizuku')->first()->id);
        // }
        $shops = Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank', 'asc')->get();
        return view('admin.pickup.detail', [
            'shop' => Shop::findOrFail($id),
            'casts' => Cast::where('shop_id', $id)->where('is_public', 1)->get(),
            'pickups' => Pickup::where('shop_id', $id)->get(),
            'shops' => $shops,
        ]);
    }

    /**
     * Update the specified cast.
     */
    public function update(Request $request, string $id): RedirectResponse
    {

        $pickups = $request->input('pickup', []);

       // 同じcast_idがないかチェック（nullは除外）
       $nonNullPickups = array_filter($pickups, function($value) {
        return $value !== null && $value !== '';
        });
        $uniquePcikups = array_unique($nonNullPickups);
        $duplicatePickups = array_diff_assoc($nonNullPickups, $uniquePcikups);
        if (count($uniquePcikups) !== count($nonNullPickups)) {
            $duplicateCastIDs = array_unique($duplicatePickups);
            $duplicateCastNames = array_map(function($value) {
                return Cast::find($value)->name;
            }, $duplicateCastIDs);
            // return redirect()->back()->withInput()->withErrors(['error' => __('message.admin_pickup_error') . 'キャスト名: ' . implode(', ', $duplicateCastNames)]);
            return redirect()->back()->withInput()->withErrors(['error' => __('message.admin_pickup_error')]);
        }

        Pickup::where('shop_id', $id)->delete();

        foreach ($pickups as $cast_id) {
            if (is_numeric($cast_id)) {
                Pickup::create([
                    'shop_id' => $id,
                    'cast_id' => $cast_id,
                ]);
            }
        }

        return redirect('/admin/pickup/' . $id)->with('success', __('message.admin_pickup_update_success'));
    }
}
