<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TouchVipCastController extends Controller
{
    const DEFAULT_LIMIT = 30;

    /**
     * Display a listing of the cast.
     */
    public function index(Request $request): View
    {
        $query = Cast::where('shop_id', Shop::where('slug', 'touchvip')->first()->id);

        if ($request->has('cast')) {
            $cast = '%' . $request->query('cast') . '%';
            $query->where('name', 'like', $cast);
        }

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $casts = $query->skip($skip)
            ->take($limit)
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.touchvip-cast.index', [
            'casts' => $casts,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
        ]);
    }

    /**
     * Create a cast.
     */
    public function create(): View
    {
        $touchvip = Shop::where('slug', 'touchvip')->first();

        return view('admin.touchvip-cast.create', [
            'shop' => $touchvip,
        ]);
    }

    /**
     * Store a cast.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'cast_name' => 'required',
            'profile_url' => 'required',
            'diary_email_to' => 'required|email',
        ]);

        $cast = Cast::firstOrCreate([
            'name' => request('cast_name'),
            'shop_id' => request('shop_id'),
            'profile_url' => request('profile_url'),
            'diary_email_from' => request('diary_email_from'),
            'diary_email_to' => request('diary_email_to'),
        ]);

        return redirect('/admin/touchvip-cast');
    }

    /**
     * Display the specified cast.
     */
    public function show(Request $request, string $id): View
    {
        $cast = Cast::find($id);

        return view('admin.touchvip-cast.detail', [
            'cast' => $cast,
        ]);
    }

    /**
     * Update the specified cast.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'profile_url' => 'required',
            'diary_email_to' => 'required|email',
        ]);

        $cast = Cast::find($id);

        $cast->profile_url = $request->profile_url;
        $cast->diary_email_from = $request->diary_email_from;
        $cast->diary_email_to = $request->diary_email_to;

        $cast->save();

        return redirect('/admin/touchvip-cast/' . $cast->id);
    }

    /**
     * Destroy the specified cast.
     */
    public function destroy(string $id): RedirectResponse
    {
        $cast = Cast::find($id);
        $cast->delete();

        return redirect('admin/touchvip-cast');
    }
}
