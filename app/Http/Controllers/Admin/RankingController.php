<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Ranking;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Rank;

class RankingController extends Controller
{
    public function index(Request $request): View
    {
        $user = Auth::guard('web')->user();
        $query = Ranking::query();
        $ranks = Rank::orderBy('id', 'asc')->get();

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
        $shops = Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get();
        // return view('admin.ranking.index', [
        //     'shops' => $shops,
        // ]);

        return view('admin.ranking.detail', [
            'ranks' => $ranks,
            'shops' => $shops,
            'shop' => Shop::findOrFail($shop_id),
            'casts' => Cast::where('shop_id', $shop_id)->where('is_public', 1)->get(),
            'rankings' => $query->orderBy('rank_id', 'asc')->orderBy('rank', 'asc')->get(),
        ]);

    }

    public function show(Request $request, string $id): View
    {
        $ranks = Rank::orderBy('id', 'asc')->get();
        $shops = Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get();
        return view('admin.ranking.detail', [
            'ranks' => $ranks,
            'shop' => Shop::findOrFail($id),
            'casts' => Cast::where('shop_id', $id)->where('is_public', 1)->get(),
            'rankings' => Ranking::where('shop_id', $id)->get(),
            'shops' => $shops,
        ]);
    }

    /**
     * Update the specified ranking.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // $rankings = $request->input('rank', []);
        $rankings_req = $request->input('rank',[[]]);
        // dd($rankings_req);
        foreach ($rankings_req as $rankings) {
            // 同じcast_idがないかチェック（nullは除外）
            $nonNullRankings = array_filter($rankings, function($value) {
                return $value !== null && $value !== '';
            });
            $uniqueRankings = array_unique($nonNullRankings);
            $duplicateRankings = array_diff_assoc($nonNullRankings, $uniqueRankings);
            if (count($uniqueRankings) !== count($nonNullRankings)) {
                $duplicateCastIDs = array_unique($duplicateRankings);
                $duplicateCastNames = array_map(function($value) {
                    return Cast::find($value)->name;
                }, $duplicateCastIDs);
                return redirect()->back()->withInput()->withErrors(['error' => '同じキャストは複数選択できません。キャスト名: ' . implode(', ', $duplicateCastNames)]);
            }
        }
        Ranking::where('shop_id', $id)->delete();

        foreach ($rankings_req as $rank_id => $rankings) {
            // dd($rankings,$rank_id);
            // $rank_id = $rankings;
            foreach ($rankings as $index => $cast_id) {
                // dd($cast_id,$index,$rank_id,$rankings);
                if (is_numeric($cast_id)) {
                    Ranking::create([
                        'shop_id' => $id,
                        'cast_id' => $cast_id,
                        'rank' => $index,
                        'rank_id' => $rank_id,
                    ]);
                }else if ( $cast_id === null ) {
                    Ranking::create([
                        'shop_id' => $id,
                        'cast_id' => null,
                        'rank' => $index + 1,
                        'rank_id' => $rank_id,
                    ]);
                }
            }
        }

        // foreach ($rankings as $index => $cast_id) {
        //     if (is_numeric($cast_id)) {
        //         Ranking::create([
        //             'shop_id' => $id,
        //             'cast_id' => $cast_id,
        //             'rank' => $index + 1,
        //         ]);
        //     }else if ( $cast_id === null ) {
        //         Ranking::create([
        //             'shop_id' => $id,
        //             'cast_id' => null,
        //             'rank' => $index + 1,
        //         ]);
        //     }
        // }

        return redirect('/admin/ranking/' . $id)->with('success', 'ランキングを更新しました。');
    }
}