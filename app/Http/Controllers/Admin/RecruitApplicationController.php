<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecruitApplication;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecruitApplicationController extends Controller
{
    private const DEFAULT_LIMIT = 30;

    /**
     * Display a listing of recruit applications.
     */
    public function index(Request $request): View
    {
        $query = RecruitApplication::query();

        if ($request->filled('type')) {
            $query->where('type', (string) $request->query('type'));
        }

        if ($request->filled('status')) {
            $query->where('status', (string) $request->query('status'));
        }

        if ($request->filled('shop')) {
            $query->where('shop', 'like', '%' . (string) $request->query('shop') . '%');
        }

        if ($request->filled('q')) {
            $keyword = (string) $request->query('q');
            $query->where(function ($subQuery) use ($keyword): void {
                $subQuery
                    ->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                    ->orWhere('phone', 'like', '%' . $keyword . '%')
                    ->orWhere('inquiry', 'like', '%' . $keyword . '%');
            });
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', (string) $request->query('date_from'));
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', (string) $request->query('date_to'));
        }

        $limit = (int) $request->query('limit', self::DEFAULT_LIMIT);
        if (!in_array($limit, [30, 50, 100], true)) {
            $limit = self::DEFAULT_LIMIT;
        }

        $applications = $query
            ->orderByDesc('created_at')
            ->paginate($limit)
            ->withQueryString();

        return view('admin.recruit-application.index', [
            'applications' => $applications,
        ]);
    }

    /**
     * Display the specified recruit application.
     */
    public function show(string $id): View
    {
        return view('admin.recruit-application.detail', [
            'application' => RecruitApplication::findOrFail($id),
        ]);
    }
}

