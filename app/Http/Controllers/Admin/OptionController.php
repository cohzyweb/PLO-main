<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OptionController extends Controller
{
    const DEFAULT_LIMIT = 10;

    /**
     * Display a listing of the option.
     */
    public function index(Request $request): View
    {
        $query = Option::query();

        if ($request->has('option')) {
            $option = '%' . $request->query('option') . '%';
            $query->where('name', 'like', $option);
        }

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $options = $query->skip($skip)
            ->take($limit)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.option.index', [
            'options' => $options,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
        ]);
    }

    /**
     * Create a option.
     */
    public function create(): View
    {
        return view('admin.option.create');
    }

    /**
     * Store a option.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'option_name' => 'required',
            'price' => 'required|numeric',
        ]);

        $option = Option::firstOrCreate([
            'name' => request('option_name'),
            'price' => request('price'),
            'description' => request('description'),
            'is_public' => true,
        ]);

        return redirect('/admin/option/');
    }

    /**
     * Display the specified option.
     */
    public function show(string $id): View
    {
        $option = Option::find($id);

        return view('admin.option.detail', [
            'option' => $option,
        ]);
    }

    /**
     * Update the specified option.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'option_name' => 'required',
            'price' => 'required|numeric',
        ]);

        $option = Option::find($id);

        $option->name = $request->option_name;
        $option->price = $request->price;
        $option->description = $request->description;

        $option->save();

        return redirect('/admin/option/' . $option->id);
    }

    /**
     * Destroy the specified option.
     */
    public function destroy(string $id): RedirectResponse
    {
        $option = Option::find($id);
        $option->delete();

        return redirect('admin/option');
    }
}
