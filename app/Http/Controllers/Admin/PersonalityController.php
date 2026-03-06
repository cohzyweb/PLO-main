<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personality;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PersonalityController extends Controller
{
    const DEFAULT_LIMIT = 10;

    /**
     * Display a listing of the personality.
     */
    public function index(Request $request): View
    {
        $query = Personality::query();

        if ($request->has('personality')) {
            $personality = '%' . $request->query('personality') . '%';
            $query->where('name', 'like', $personality);
        }

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $personalities = $query->skip($skip)
            ->take($limit)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.personality.index', [
            'personalities' => $personalities,
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
        return view('admin.personality.create');
    }

    /**
     * Store a personality.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'personality_name' => 'required',
        ]);

        $personality = Personality::firstOrCreate([
            'name' => request('personality_name'),
            'description' => request('description'),
            'is_public' => true,
        ]);

        return redirect('/admin/personality/');
    }

    /**
     * Display the specified personality.
     */
    public function show(string $id): View
    {
        $personality = Personality::find($id);

        return view('admin.personality.detail', [
            'personality' => $personality,
        ]);
    }

    /**
     * Update the specified personality.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'personality_name' => 'required',
        ]);

        $personality = Personality::find($id);

        $personality->name = $request->personality_name;
        $personality->description = $request->description;

        $personality->save();

        return redirect('/admin/personality/' . $personality->id);
    }

    /**
     * Destroy the specified personality.
     */
    public function destroy(string $id): RedirectResponse
    {
        $personality = Personality::find($id);
        $personality->delete();

        return redirect('admin/personality');
    }
}
