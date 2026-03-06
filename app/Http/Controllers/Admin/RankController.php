<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rank;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RankController extends Controller
{
    const DEFAULT_LIMIT = 10;

    /**
     * Display a listing of the personality.
     */
    public function index(Request $request): View
    {
        $query = Rank::query();

        if ($request->has('rank')) {
            $rank = '%' . $request->query('rank') . '%';
            $query->where('name', 'like', $rank);
        }

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $ranks = $query->skip($skip)
            ->take($limit)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.rank.index', [
            'ranks' => $ranks,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
        ]);
    }

    /**
     * Create a personality.
     */
    public function create(): View
    {
        return view('admin.rank.create');
    }

    /**
     * Store a personality.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'rank_name' => 'required',
        ]);

        $rank = Rank::firstOrCreate([
            'name' => request('rank_name'),
            'description' => request('description'),
            'is_public' => true,
        ]);

        return redirect('/admin/rank/');
    }

    /**
     * Display the specified personality.
     */
    public function show(string $id): View
    {
        $rank = Rank::find($id);

        return view('admin.rank.detail', [
            'rank' => $rank,
        ]);
    }

    /**
     * Update the specified personality.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'rank_name' => 'required',
        ]);

        $rank = Rank::find($id);

        $rank->name = $request->rank_name;
        $rank->description = $request->description;

        $rank->save();

        return redirect('/admin/rank/' . $rank->id);
    }

    /**
     * Destroy the specified personality.
     */
    public function destroy(string $id): RedirectResponse
    {
        $rank = Rank::find($id);
        $rank->delete();

        return redirect('admin/rank');
    }
}
