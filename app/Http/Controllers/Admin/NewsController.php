<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Event;
use App\Models\Shop;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    const DEFAULT_LIMIT = 30;
    /**
     * Display a listing of the event.
     */
    public function index(Request $request): View
    {
      $query = News::query();
      if ( $request->has('shop') && $request->query('shop') !== null) {
        $shop = $request->query('shop');
        $query -> whereHas('shop', function ($query) use ($shop) {
            $query->where('slug', $shop);
        });

      }

      // if ($request->has('public') && $request->query('public') !== null) {
      //   $query->where('is_public', $request->query('public') ? true : false);
      // }
      if ( $request->has('publish_type') && $request->query('publish_type') !== null) {
        $query->where('published_status', $request->query('publish_type'));
      }
      if ( $request->has('published_at') && $request->query('published_at') !== null) {
        $query->where('published_at', $request->query('published_at'));
      }

      $total = $query->count();

      $page = $request->query('page') ? (int) $request->query('page') : 1;
      $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
      $skip = ($page - 1) * $limit;
      $pages = ceil($total / $limit);

      return view('admin.news.index', [
          'news' => $query->orderBy('updated_at', 'desc')->get(),
          'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
          'page' => $page,
          'limit' => $limit,
          'skip' => $skip,
          'total' => $total,
          'pages' => $pages,
      ]);
    }

    /**
     * Display the specified event.
     */
    public function show(Request $request, string $id): View
    {
      // $event = Event::findOrFail($id);
      // dd($event);
      $token =Auth::guard('web')->user()->createToken('news')->plainTextToken;
      $news = News::findOrFail($id);
      $imagePath = storage_path('app/public/' . $news->thumbnail);
      [$width, $height] = getimagesize($imagePath);

      $shop_id = 0;

      if (Auth::guard('web')->user()->hasRole('shop')) {
        $user = Auth::guard('web')->user();
        $shop_user = DB::connection('mysql')->table('shop_user')->where('user_id', $user->id)->first();
        $shop_id = $shop_user->shop_id;
      }
      // dd($width, $height);
        return view('admin.news.detail', [
            'news' => News::findOrFail($id),
            'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
            'shop' => Shop::findOrFail($shop_id),
            'token' => $token,
            'width' => $width,
            'height' => $height,
        ]);
    }

    /**
     * Update the specified event.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
      // $validated = $request->validate([
      //   'cast_name' => 'required',
      //   'shop_id' => 'required',
      // ]);
      $request->validate([
        'title' => 'required',
        'shop_id' => 'required',
      ],['title.required' => 'タイトルは必須です。','shop_id.required' => '店舗は必須です。']);
      $file_path = "news/{$id}";
      $file1 = $request->file('file_1');
      if ( ($file1 == null && $request->path_1 == null) ) {
        return redirect()->back()->withErrors(['file_1' => '画像は必須です。']);
      }

      $news = News::find($id);
      $news->title = $request->title;
      $news->shop_id = $request->shop_id;
      $news->published_at = $request->published_at;
      $news->published_status = $request->publish_type;
      $news->thumbnail = $file1 ? $file1->store($file_path, 'public') : $request->path_1;
      $news->contents = $request->news_content;
      $news->save();


      return redirect('/admin/news')->with('success', __('message.admin_news_update_success'));
    }
    /**
     * Create a event.
     */
    public function create(Request $request): View
    {
        $token =Auth::guard('web')->user()->createToken('news')->plainTextToken;
        return view('admin.news.create', [
            'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
            'token' => $token,
        ]);
    }
    /**
     * Store a event.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $validated = $request->validate([
            'shop_id' => 'required',
            'title' => 'required',
            'file_1' => 'required',
        ],['title.required' => 'タイトルは必須です。','shop_id.required' => '店舗は必須です。','file_1.required' => '画像は必須です。']);
        // dd($request);
        $published_status = $request->publish_type;
        // dd($published_status);
        $news = News::Create([
            'title' => $request->title,
            'shop_id' => $request->shop_id,
            'published_at' => $request->published_at,
            'published_status' => $published_status,
            'contents' => $request->news_content,
        ]);
        $file_path = "news/{$news->id}";
        $file1 = $request->file('file_1');
        $news->thumbnail = $file1 ? $file1->store($file_path, 'public') : null;
        $news->save();

        return redirect('/admin/news')->with('success', __('message.admin_news_create_success'));
    }
    public function destroy(string $id): RedirectResponse
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect('/admin/news')->with('success', __('message.admin_news_delete_success'));
    }
}

?>