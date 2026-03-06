<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Individuality;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IndividualityController extends Controller
{
    const DEFAULT_LIMIT = 10;

    /**
     * Display a listing of the personality.
     */
    public function index(Request $request): View
    {
        $query = Individuality::query();

        if ($request->has('individuality')) {
            $individuality = '%' . $request->query('individuality') . '%';
            $query->where('name', 'like', $individuality);
        }

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $individualities = $query->skip($skip)
            ->take($limit)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.individuality.index', [
            'individualities' => $individualities,
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
        return view('admin.individuality.create');
    }

    /**
     * Store a personality.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'individuality_name' => 'required',
        ]);

        $individuality = Individuality::firstOrCreate([
            'name' => request('individuality_name'),
            'description' => request('description'),
            'is_public' => true,
        ]);

        return redirect('/admin/individuality/');
    }

    /**
     * Display the specified personality.
     */
    public function show(string $id): View
    {
        $individuality = Individuality::find($id);

        return view('admin.individuality.detail', [
            'individuality' => $individuality,
        ]);
    }

    /**
     * Update the specified personality.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'individuality_name' => 'required',
        ]);

        $individuality = Individuality::find($id);

        $individuality->name = $request->individuality_name;
        $individuality->description = $request->description;

        $individuality->save();

        return redirect('/admin/individuality/' . $individuality->id);
    }

    /**
     * Destroy the specified personality.
     */
    public function destroy(string $id): RedirectResponse
    {
        $individuality = Individuality::find($id);
        $individuality->delete();

        return redirect('admin/individuality');
    }
}
