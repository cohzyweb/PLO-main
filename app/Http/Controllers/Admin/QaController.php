<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Ranking;
use App\Models\Shop;
use App\Models\Qa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Termwind\Components\Raw;
use App\Models\Question;

class QaController extends Controller
{
    const DEFAULT_LIMIT = 10;
    public function index(Request $request): View
    {
        $query = Question::query();


        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $questions = $query->skip($skip)
            ->take($limit)
            ->orderBy('id', 'desc')
            ->get();
        
        return view('admin.qa.index', [
            'questions' => $questions,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
        ]);
    }

        /**
     * Create a question.
     */
    public function create(): View
    {
        return view('admin.qa.create');
    }

    /**
     * Store a question.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'question' => 'required',
        ],['question.required' => '質問を必須です。']);

        $question = Question::Create([
            'question' => request('question'),
            'is_public' => $request->is_public ? true : false,
        ]);

        return redirect('/admin/qa')->with('success', '質問を追加しました。');
    }

    public function show(Request $request, string $id): View
    {
        return view('admin.qa.detail', [
            'question' => Question::findOrFail($id),
        ]);
    }

    /**
     * Update the specified ranking.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'question' => 'required',
        ],['question.required' => '質問を必須です。']);
        Question::where('id', $id)->update([
            'question' => $request->question,
            'is_public' => $request->is_public ? true : false,
        ]);

        return redirect('/admin/qa/' . $id)->with('success', '質問を更新しました。');
    }

    public function destroy(string $id): RedirectResponse
    {
        Question::where('id', $id)->delete();

        return redirect('/admin/qa')->with('success', '質問を削除しました。');
    }
}