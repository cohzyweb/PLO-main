<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StyleController extends Controller
{
    const DEFAULT_LIMIT = 10;

    /**
     * Display a listing of the style.
     */
    public function index(Request $request): View
    {
        $query = Style::query();

        if ($request->has('style')) {
            $style = '%' . $request->query('style') . '%';
            $query->where('name', 'like', $style);
        }

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $styles = $query->skip($skip)
            ->take($limit)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.style.index', [
            'styles' => $styles,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
        ]);
    }

    /**
     * Create a style.
     */
    public function create(): View
    {
        return view('admin.style.create');
    }

    /**
     * Store a style.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'style_name' => 'required',
        ]);

        $style = Style::firstOrCreate([
            'name' => request('style_name'),
            'description' => request('description'),
            'is_public' => true,
        ]);

        return redirect('/admin/style');
    }

    /**
     * Display the specified style.
     */
    public function show(string $id): View
    {
        $style = Style::find($id);

        return view('admin.style.detail', [
            'style' => $style,
        ]);
    }

    /**
     * Update the specified style.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'style_name' => 'required',
        ]);

        $style = Style::find($id);

        $style->name = $request->style_name;
        $style->description = $request->description;

        $style->save();

        return redirect('/admin/style/' . $style->id);
    }

    /**
     * Destroy the specified style.
     */
    public function destroy(string $id): RedirectResponse
    {
        $style = Style::find($id);
        $style->delete();

        return redirect('admin/style');
    }
}
