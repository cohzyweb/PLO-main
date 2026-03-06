<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseGroup;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
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
            $query = CourseGroup::query()->where('shop_id', $shop_id);
            $shop = Shop::find($shop_id);
        } else {
            $query = CourseGroup::query();

            if ($request->has('shop') && $request->query('shop')) {
                $shop_slug = $request->query('shop');
                $query->whereHas('shop', function ($query) use ($shop_slug) {
                    $query->where('slug', $shop_slug);
                });
            }
        }

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $courses = $query->skip($skip)
            ->take($limit)
            ->orderBy('id', 'asc')->get();

        return view('admin.course.index', [
            'courses' => $courses,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
            'shops' => $is_shop_manager ? null : Shop::whereNot('slug', 'touchvip')->whereNot('slug','headquarter')->orderBy('rank', 'asc')->get(),
            'shop' => $is_shop_manager ? $shop : null,
        ]);
    }

    public function create(Request $request): View
    {
        $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        if ($is_shop_manager) {
            $shop_id = $request->user()->shops->first()->id;
            $shop = Shop::find($shop_id);
        }

        return view('admin.course.create', [
            'shops' => $is_shop_manager ? null : Shop::whereNot('slug', 'touchvip')->whereNot('slug','headquarter')->orderBy('rank', 'asc')->get(),
            'shop' => $is_shop_manager ? $shop : null,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'course_name' => 'required',
            'price' => 'required|numeric',
            'shop_id' => 'required',
        ]);

        $course = CourseGroup::firstOrCreate([
            'course' => request('course_name'),
            'price' => request('price'),
            'shop_id' => request('shop_id'),
            'description' => request('description'),
        ]);

        return redirect('/admin/course/');
    }

    /**
     * Display the specified diary.
     */
    public function show(Request $request, string $id): View
    {
        $course = CourseGroup::find($id);
        // $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        // if ($is_shop_manager) {
        //     $shop_id = $request->user()->shops->first()->id;
        //     $shop = Shop::find($shop_id);
        // }
        $shop=Shop::find($course->shop_id);
        return view('admin.course.detail', [
            'course' => $course,
            'shop' => $shop,
            // 'shops' => $is_shop_manager ? null : Shop::all(),
            // 'shop' => $is_shop_manager ? $shop : null,
        ]);
    }

    /**
     * Update the specified review.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'course_name' => 'required',
            'price' => 'required|numeric',
            'shop_id' => 'required',
        ]);

        $course = CourseGroup::find($id);
        $course->course = request('course_name');
        $course->price = request('price');
        $course->shop_id = request('shop_id');
        $course->description = request('description');
        $course->save();

        return redirect('/admin/course');
    }

    public function destroy(string $id): RedirectResponse
    {
        $course = CourseGroup::find($id);
        $course->delete();

        return redirect('/admin/course')->with('success', __('message.admin_course_delete_success'));
    }
}
