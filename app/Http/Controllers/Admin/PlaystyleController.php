<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Playstyle;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PlaystyleController extends Controller
{
    const DEFAULT_LIMIT = 10;

    /**
     * Display a listing of the playstyle.
     */
    public function index(Request $request): View
    {
        $query = Playstyle::query();

        if ($request->has('playstyle')) {
            $playstyle = '%' . $request->query('playstyle') . '%';
            $query->where('name', 'like', $playstyle);
        }

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $playstyles = $query->skip($skip)
            ->take($limit)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.playstyle.index', [
            'playstyles' => $playstyles,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
        ]);
    }

    /**
     * Create a playstyle.
     */
    public function create(): View
    {
        return view('admin.playstyle.create');
    }

    /**
     * Store a playstyle.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'playstyle_name' => 'required',
        ]);

        $playstyle = Playstyle::firstOrCreate([
            'name' => request('playstyle_name'),
            'description' => request('description'),
            'is_public' => true,
        ]);

        return redirect('/admin/playstyle/');
    }

    /**
     * Display the specified playstyle.
     */
    public function show(string $id): View
    {
        $playstyle = Playstyle::find($id);

        return view('admin.playstyle.detail', [
            'playstyle' => $playstyle,
        ]);
    }

    /**
     * Update the specified playstyle.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'playstyle_name' => 'required',
        ]);

        $playstyle = Playstyle::find($id);

        $playstyle->name = $request->playstyle_name;
        $playstyle->description = $request->description;

        $playstyle->save();

        return redirect('/admin/playstyle/' . $playstyle->id);
    }

    /**
     * Destroy the specified playstyle.
     */
    public function destroy(string $id): RedirectResponse
    {
        $playstyle = Playstyle::find($id);
        $playstyle->delete();

        return redirect('admin/playstyle');
    }
}
