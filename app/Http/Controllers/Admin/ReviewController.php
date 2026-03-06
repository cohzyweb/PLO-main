<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
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
            $query = Review::query()->whereHas('cast', function ($query) use ($shop_id) {
                $query->whereHas('shop', function ($query) use ($shop_id) {
                    $query->where('id', $shop_id);
                });
            });
        } else {
            $query = Review::query();
        }

        if ($request->has('search') && $request->query('search')) {
            $search = '%' . $request->query('search') . '%';
            $query->whereHas('cast', function ($query) use ($search) {
                $query->where('name', 'like', $search);
            })->whereHas('member', function ($query) use ($search) {
                $query->where('name', 'like', $search);
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

        $reviews = $query->skip($skip)
            ->take($limit)
            ->orderBy('created_at', 'desc')->get();
        // $sql = 'SELECT `'.env("DB_DATABASE").'`.reviews.id as review_id,
        //     `'.env("DB_DATABASE").'`.reviews.title as review_title,
        //     `'.env("DB_DATABASE").'`.reviews.content as review_content,
        //     `'.env("DB_DATABASE").'`.reviews.created_at as review_created_at,
        //     `'.env("DB_DATABASE").'`.reviews.is_public as review_is_public,
        //     `'.env("DB_DATABASE").'`.reviews.member_id as review_member_id,
        //     `'.env("DB_DATABASE").'`.reviews.history_id as review_history_id,
        //     `'.env("DB_DATABASE").'`.reviews.average_point as review_average_point,
        //     `'.env("DB_DATABASE").'`.reviews.cast_point as review_cast_point,
        //     `'.env("DB_DATABASE").'`.reviews.play_point as review_play_point,
        //     `'.env("DB_DATABASE").'`.reviews.price_point as review_price_point,
        //     `'.env("DB_DATABASE").'`.reviews.stuff_point as review_stuff_point,
        //     `'.env("DB_DATABASE").'`.reviews.photo_point as review_photo_point,
        //     `'.env("DB_DATABASE").'`.reviews.manager_comment as review_manager_comment,
        //     `'.env("DB_DATABASE").'`.members.name as member_name,
        //     `'.env("DB_DATABASE").'`.casts.id as cast_id,
        //     `'.env("DB_DATABASE").'`.casts.name as cast_name,
        //     `'.env("DB_DATABASE").'`.casts.age as cast_age,
        //     `'.env("DB_DATABASE").'`.casts.height as cast_height,
        //     `'.env("DB_DATABASE").'`.casts.bra_size as cast_cup,
        //     `'.env("DB_DATABASE").'`.casts.bust as cast_bust,
        //     `'.env("DB_DATABASE").'`.casts.waist as cast_waist,
        //     `'.env("DB_DATABASE").'`.casts.hip as cast_hip,
        //     `'.env("DB_DATABASE").'`.casts.gallery_1 as cast_gallery
        //     FROM `'.env("DB_DATABASE").'`.reviews
        //     LEFT JOIN `'.env("MEMBER_DB_DATABASE").'`.histories ON `'.env("DB_DATABASE").'`.reviews.history_id = `'.env("MEMBER_DB_DATABASE").'`.histories.id
        //     LEFT JOIN `'.env("DB_DATABASE").'`.members ON `'.env("DB_DATABASE").'`.reviews.member_id = `'.env("DB_DATABASE").'`.members.id
        //     LEFT JOIN `'.env("DB_DATABASE").'`.casts ON `'.env("MEMBER_DB_DATABASE").'`.histories.cast_id = `'.env("DB_DATABASE").'`.casts.id
        //     WHERE `'.env("MEMBER_DB_DATABASE").'`.histories.shop_id = '.Shop::where('slug', $shop)->first()->id.'
        //     AND `'.env("DB_DATABASE").'`.casts.is_public = 1
        //     AND `'.env("DB_DATABASE").'`.reviews.is_public = 1 ORDER BY `'.env("DB_DATABASE").'`.reviews.created_at DESC';
        // dd($reviews[0]->cast);
        return view('admin.review.index', [
            'reviews' => $reviews,
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
        $review = Review::find($id);

        $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        if ($is_shop_manager) {
            $my_shop_id = $request->user()->shops->first()->id;
            if ($review->cast->shop->id !== $my_shop_id) {
                abort(403);
            }
        }

        return view('admin.review.detail', [
            'review' => $review,
        ]);
    }

    /**
     * Update the specified review.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $review = Review::find($id);
        $review->is_public = $request->input('is_public');
        $review->manager_comment = $request->input('manager_comment');
        $review->save();

        return redirect('/admin/review');
    }

    /**
     * Delete the specified review.
     */
    public function delete(Request $request, string $id): RedirectResponse
    {
        $review = Review::find($id);
        $review->delete();

        return redirect('/admin/review');
    }
}
