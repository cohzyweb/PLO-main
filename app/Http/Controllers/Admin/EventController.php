<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Event;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventController extends Controller
{
    const DEFAULT_LIMIT = 30;
    /**
     * Display a listing of the event.
     */
    public function index(Request $request): View
    {
        // dd('aaaa');

        // $this->setPostEnd();
        // dd('aaaa');

        $user = Auth::guard('web')->user();
        $query = Event::query();
        if ( $user->hasRole('admin') ) {
            if ( $request->has('shop') && $request->query('shop') !== null) {
                $shop = $request->query('shop');
                $query -> whereHas('shop', function ($query) use ($shop) {
                    $query->where('slug', $shop);
                });

            }
        }else if ( $user->hasRole('shop') ) {
            $shop = DB::connection('mysql')->table('shop_user')->where('user_id', $user->id)->get();
            $shop_id = $shop->pluck('shop_id');
            $query->whereIn('shop_id', $shop_id);
        }
      // if ($request->has('public') && $request->query('public') !== null) {
      //   $query->where('is_public', $request->query('public') ? true : false);
      // }

    //   dd('aaaa');

      if ( $request->has('publish_type') && $request->query('publish_type') !== null) {
        if ( $request->query('publish_type') == "1" ) {
          $query->where('published_status', $request->query('publish_type'));
        }else if ( $request->query('publish_type') == "5" ) {
          $query->where('published_status', 2);
        }else if ( $request->query('publish_type') == "3" ) {
          $query->where('published_status', $request->query('publish_type'));
        }
      }
    //   dd('aaaa');

      if ( $request->has('published_at') && $request->query('published_at') !== null) {
        $query->where('published_at', $request->query('published_at'));
      }

      $total = $query->count();

      $page = $request->query('page') ? (int) $request->query('page') : 1;
      $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
      $skip = ($page - 1) * $limit;
      $pages = ceil($total / $limit);

      return view('admin.event.index', [
          'events' => $query->orderBy('updated_at', 'desc')->get(),
          'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
          'page' => $page,
          'limit' => $limit,
          'skip' => $skip,
          'total' => $total,
          'pages' => $pages,
      ]);
    }
    public function setPostEnd()
    {
        $event = Event::whereIn('published_status', [1, 2])
        // ->whereDate('published_at', '<', now()->format('Y-m-d H:i:s'))
        // ->where('published_at', '<=', now()->format('Y-m-d H:i:s'))
        ->where('published_at', '<=', Carbon::now())
        ->update(['published_status' => 4]);

    }
    /**
     * Display the specified event.
     */
    public function show(Request $request, string $id): View
    {
      // $event = Event::findOrFail($id);
      // dd($event);
        $user = Auth::guard('web')->user();
        $shop_id = DB::connection('mysql')->table('shop_user')->where('user_id', $user->id)->get();
        if ( count($shop_id) > 0 ) {
            $shop = Shop::where('id','=' ,$shop_id[0]->shop_id)->orderBy('rank', 'asc')->first();
        }else{
            $shop = null;
        }
        $token =Auth::guard('web')->user()->createToken('news')->plainTextToken;

        $event = Event::findOrFail($id);
        $imagePath = storage_path('app/public/' . $event->thumbnail);
        [$width, $height] = getimagesize($imagePath);
        // dd($event);
        // dd($width, $height);
        return view('admin.event.detail', [
            'event' => Event::findOrFail($id),
            'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
            'shop' => $shop,
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
      $file_path = "event/{$id}";
      $file1 = $request->file('file_1');
      if ( ($file1 == null && $request->path_1 == null) ) {
        return redirect()->back()->withErrors(['file_1' => '画像は必須です。']);
      }
      // dd($request);
      $event = Event::find($id);
      $event->title = $request->title;
      $event->shop_id = $request->shop_id;
      if ( $request->publish_type == 1 ) {
        $event->published_at = now();
      }else {
        $event->published_at = $request->published_at;
      }
    //   $event->published_at = $request->published_at;
      $event->published_status = $request->publish_type;
      $event->thumbnail = $file1 ? $file1->store($file_path, 'public') : $request->path_1;
    //   dd($request,$request->event_content);
      $event->contents = $request->event_content;
      $event->save();

    //   dd($request);

      return redirect('/admin/event')->with('success', __('message.admin_event_update_success'));
    }
    /**
     * Create a event.
     */
    public function create(Request $request): View
    {
        $user = Auth::guard('web')->user();
        $shop_id = DB::connection('mysql')->table('shop_user')->where('user_id', $user->id)->get();
        if ( count($shop_id) > 0 ) {
            $shop = Shop::where('id','=' ,$shop_id[0]->shop_id)->orderBy('rank', 'asc')->first();
        }else{
            $shop = null;
        }
        // dd($shop->name);
        $token =Auth::guard('web')->user()->createToken('news')->plainTextToken;
        return view('admin.event.create', [
            'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
            'shop' => $shop,
            'token' => $token,
        ]);
    }
    /**
     * Store a event.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'shop_id' => 'required',
            'title' => 'required',
            'file_1' => 'required',
        ],['file_1.required' => '画像は必須です。','title.required' => 'タイトルは必須です。','shop_id.required' => '店舗は必須です。']);
        // dd($request);
        $published_status = $request->publish_type;
        // dd($published_status);
        $event = Event::Create([
            'title' => $request->title,
            'shop_id' => $request->shop_id,
            'published_at' => $request->published_at,
            'published_status' => $published_status,
            'contents' => $request->event_content,
        ]);
        $file_path = "event/{$event->id}";
        $file1 = $request->file('file_1');
        $event->thumbnail = $file1 ? $file1->store($file_path, 'public') : null;
        $event->save();

        return redirect('/admin/event')->with('success', __('message.admin_event_create_success'));
    }
    public function destroy(string $id): RedirectResponse
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect('/admin/event')->with('success', __('message.admin_event_delete_success'));
    }
}

?>
