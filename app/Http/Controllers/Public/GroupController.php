<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Pickup;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Personality;
use App\Models\Style;
use App\Models\Option;
use App\Models\Event;
use App\Models\Banner;
use App\Models\News;
use App\Models\Attendance;
use App\Models\Member;
use App\Models\Point;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Diary;
use App\Models\History;
use App\Models\Video;
use App\Models\Review;
use Illuminate\Support\Facades\Http;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class GroupController extends Controller
{
    /**
     * Display the group home page.
     */
    public function showHome(Request $request): View
    {
        $cast_query = Cast::whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)->whereNot('shop_id', Shop::where('slug', 'headquarter')->first()->id);
        // $newfaces_this_week = $cast_query
        //     ->where('created_at', '>=', Carbon::now()->subWeek(2))
        //     ->inRandomOrder()
        //     ->get();
        // // dd($newfaces_this_week);
        // $newfaces_this_month = $cast_query
        //     ->where('created_at', '>=', Carbon::now()->subMonth(1))
        //     // ->where('created_at', '>=', Carbon::now()->subDays(30))
        //     ->inRandomOrder()
        //     ->get();
        $newfaces_this_week = $cast_query
            ->where('joined_at', '>=', Carbon::now()->subWeek(2))
            ->inRandomOrder()
            ->get();
        // dd($newfaces_this_week);
        $newfaces_this_month = $cast_query
            ->where('joined_at', '>=', Carbon::now()->subMonth(1))
            // ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->inRandomOrder()
            ->get();
        $events = Event::where('published_status', 1)
            ->where('shop_id', Shop::where('slug', 'headquarter')->first()->id)
            ->orWhere(function($query) {
                $query->where('published_status', 2)
                    ->where('published_at', '<=', Carbon::now());
            })
            ->orWhere('published_status',4)
            ->where('published_at', '>=', Carbon::now()->subMonth(1))
            ->orderBy('published_at', 'desc')
            ->get();
        $banners = Banner::where('is_public', 1)->where('shop_id',Shop::where('slug', 'headquarter')->first()->id)->orderBy('updated_at', 'desc')->get();

        $news = News::leftJoin('shops', 'news.shop_id', '=', 'shops.id')
        ->whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)
        ->where('published_status', 1)
        ->orWhere(function($query) {
            $query->where('published_status', 2)
                  ->where('published_at', '<=', Carbon::now());
        })
        ->inRandomOrder()
        ->limit($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 7 : 9)
        ->orderBy('published_at', 'desc')
        ->get();
        $diaries_sql = 'SELECT
        `'.env('DB_DATABASE').'`.diaries.id,
        `'.env('DB_DATABASE').'`.diaries.subject,
        DATE_FORMAT(`'.env("DB_DATABASE").'`.diaries.updated_at, "%y.%m.%d") as updated_at,
        `'.env('DB_DATABASE').'`.casts.name,
        `'.env('DB_DATABASE').'`.diaries.photo,
        `'.env('DB_DATABASE').'`.casts.id as cast_id,
        `'.env('DB_DATABASE').'`.shops.slug as shop_slug
        FROM `'.env('DB_DATABASE').'`.diaries
LEFT JOIN `'.env('DB_DATABASE').'`.casts
ON `'.env('DB_DATABASE').'`.diaries.`cast_id` = `'.env('DB_DATABASE').'`.casts.`id`
INNER JOIN (
SELECT `'.env('DB_DATABASE').'`.casts.`shop_id` AS shop_id , MAX(`'.env('DB_DATABASE').'`.diaries.`updated_at`) AS last_created
FROM `'.env('DB_DATABASE').'`.diaries
LEFT JOIN `'.env('DB_DATABASE').'`.casts
ON `'.env('DB_DATABASE').'`.casts.`id` = `'.env('DB_DATABASE').'`.diaries.`cast_id`
WHERE `'.env('DB_DATABASE').'`.diaries.`is_public` = 1 AND `'.env('DB_DATABASE').'`.casts.`is_public` = 1
GROUP BY `'.env('DB_DATABASE').'`.casts.shop_id
) AS qry1
ON qry1.shop_id = `'.env('DB_DATABASE').'`.casts.`shop_id` AND `'.env('DB_DATABASE').'`.diaries.`updated_at` = qry1.last_created
LEFT JOIN `'.env('DB_DATABASE').'`.shops
ON `'.env('DB_DATABASE').'`.casts.`shop_id` = `'.env('DB_DATABASE').'`.shops.`id`
WHERE `'.env('DB_DATABASE').'`.diaries.`is_public` = 1 AND `'.env('DB_DATABASE').'`.casts.`is_public` = 1
AND `'.env('DB_DATABASE').'`.shops.`slug` != "touchvip" AND `'.env('DB_DATABASE').'`.shops.`slug` != "headquarter"
ORDER BY `'.env('DB_DATABASE').'`.shops.`rank` ASC';
        // dd($diaries_sql);
        $diaries = DB::select($diaries_sql);
        // dd($diaries);
        // $diaries = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
        //     ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
        //     ->where('diaries.is_public', 1)
        //     ->where('casts.is_public', 1)
        //     ->whereNot('shops.slug', 'touchvip')
        //     ->whereNot('shops.slug', 'headquarter')
        //     ->groupBy('shops.id')
        //     ->havingRaw('MAX(diaries.updated_at)')
        //     ->orderBy('shops.rank', 'asc')
        //     // ->orderBy('diaries.updated_at', 'desc') // ここを明示
        //     ->select([
        //         'diaries.id',
        //         'diaries.subject',
        //         'diaries.updated_at',
        //         'casts.name',
        //         'diaries.photo',
        //         'casts.id as cast_id',
        //         'shops.slug as shop_slug',
        //     ])
        //     // ->limit(9)
        //     ->get();
        $videos = Video::leftJoin('casts', 'videos.cast_id', '=', 'casts.id')
        ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
        ->where('videos.is_public', 1)
        ->where('casts.is_public', 1)
        ->orderBy('videos.updated_at', 'desc')
        ->limit(4)
        ->select('videos.*','casts.*','shops.slug as shop_slug','shops.name as shop_name')
        ->get();
        // dd($videos);
        $shops = Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank', 'asc')->get();
        // dd($diaries);
        $pickups = Pickup::leftJoin('casts', 'pickups.cast_id', '=', 'casts.id')
        ->where('casts.is_public', 1)
        ->inRandomOrder()
        ->limit(9)
        ->get();

        $todayCasts = Cast::leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
        ->leftJoin('attendances', 'attendances.cast_id', '=', 'casts.id')
        ->where('casts.is_public', 1)
        // ->where('shops.slug', 'like', $shop)
        ->whereRaw('DATE(attendances.start_datetime) = CURDATE()')
        ->select([
            'casts.id as id',
            'casts.name as name',
            'casts.age as age',
            'casts.height as height',
            'casts.bust as bust',
            'casts.waist as waist',
            'casts.hip as hip',
            'casts.gallery_1 as gallery_1',
            'casts.appeal_point as appeal_point',
            'attendances.start_datetime as start_datetime',
            'attendances.end_datetime as end_datetime',
            'shops.slug as shop_slug',
            'shops.name as shop_name',
            ]) // 必要に応じて明示的に
        ->inRandomOrder()
        ->limit(9)
        ->get();
        // dd($todayCasts);
        // $url = 'https://x.com/ShizukuHealth';
        // $response = Http::withHeader('User-Agent', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Mobile/15E148 Safari/604.1')
        //     ->get($url);
        // $shizukuX = $response->body();
        return view('public.group.front', [
            'pickups' => $pickups,
            'newfaces_this_week' => $newfaces_this_week,
            'newfaces_this_month' => $newfaces_this_month,
            'events' => $events,
            'banners' => $banners,
            'news' => $news,
            'diaries' => $diaries,
            'shops' => $shops,
            'news' => $news,
            'videos' => $videos,
            'todayCasts' => $todayCasts,
            // 'shizukuX' => $shizukuX,
        ]);
    }
    public function showFront(Request $request): View
    {
        $cast_query = Cast::whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)->whereNot('shop_id', Shop::where('slug', 'headquarter')->first()->id);
        $newfaces_this_week = $cast_query
            ->where('created_at', '>=', Carbon::now()->subWeek(2))
            ->inRandomOrder()
            ->get();
        // dd($newfaces_this_week);
        $newfaces_this_month = $cast_query
            ->where('created_at', '>=', Carbon::now()->subMonth(1))
            // ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->inRandomOrder()
            ->get();
        $events = Event::where('published_status', 1)
            ->where('shop_id', Shop::where('slug', 'headquarter')->first()->id)
            ->orWhere(function($query) {
                $query->where('published_status', 2)
                    ->where('published_at', '<=', Carbon::now());
            })
            ->orderBy('published_at', 'desc')
            ->get();
        $banners = Banner::where('is_public', 1)->where('shop_id',Shop::where('slug', 'headquarter')->first()->id)->orderBy('updated_at', 'desc')->get();

        $news = News::leftJoin('shops', 'news.shop_id', '=', 'shops.id')
        ->whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)
        ->where('published_status', 1)
        ->orWhere(function($query) {
            $query->where('published_status', 2)
                  ->where('published_at', '<=', Carbon::now());
        })
        ->inRandomOrder()
        ->limit($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 7 : 9)
        ->orderBy('published_at', 'desc')
        ->get();

        $diaries = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
            ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
            ->where('diaries.is_public', 1)
            ->where('casts.is_public', 1)
            ->whereNot('shops.slug', 'touchvip')
            ->whereNot('shops.slug', 'headquarter')
            ->orderBy('diaries.updated_at', 'desc') // ここを明示
            ->select([
                'diaries.id',
                'diaries.subject',
                'diaries.updated_at',
                'casts.name',
                'diaries.photo',
                'casts.id as cast_id',
                'shops.slug as shop_slug',
            ])
            ->limit(9)
            ->get();
        $shops = Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get();
        // dd($diaries);
        return view('public.group.front', [
            'pickups' => Pickup::inRandomOrder()->limit(9)->get(),
            'newfaces_this_week' => $newfaces_this_week,
            'newfaces_this_month' => $newfaces_this_month,
            'events' => $events,
            'banners' => $banners,
            'news' => $news,
            'diaries' => $diaries,
            'shops' => $shops,
            'news' => $news,
        ]);
    }
    public function showShop(Request $request): View
    {
        return view('public.group.shop', [
            'pickups' => Pickup::inRandomOrder()->get(),
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank', 'asc')->get(),
        ]);
    }

    public function showSchedule(Request $request): View
    {
        Carbon::setLocale('ja');
        $today = Carbon::now()->format('Y-m-d');
        $days = array();
        $weekDay = Carbon::now()->format('m/d').'('.Carbon::now()->getTranslatedMinDayName().')';
        $days[0] = ['date'=>$today,'weekDay'=>$weekDay];
        for ($i = 1; $i < 7; $i++) {
            $date = Carbon::now()->addDays($i)->format('Y-m-d');
            $weekDay = Carbon::now()->addDays($i)->format('m/d').'('.Carbon::now()->addDays($i)->getTranslatedMinDayName().')';
            $days[$i] = ['date'=>$date,'weekDay'=>$weekDay] ;
        }
        Log::info($days);
        // $attendances = Attendance::whereIn('date', $days)->get();
        // $token =Auth::user()->createToken('schedule')->plainTextToken;
        // $casts = Attendance::leftJoin('casts', 'attendances.cast_id', '=', 'casts.id')
        // ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
        // ->where('casts.is_public', 1)
        // ->where('attendances.is_public', 1)
        // ->whereRaw('DATE(attendances.start_datetime) = CURDATE()')
        // ->selectRaw("
        //     attendances.id as attendance_id,
        //     DATE_FORMAT(attendances.start_datetime, '%y:%m:%d') as start_datetime,
        //     DATE_FORMAT(attendances.end_datetime, '%y:%m:%d') as end_datetime,
        //     casts.name as cast_name,
        //     casts.id as cast_id,
        //     casts.shop_id as shop_id,
        //     casts.gallery_1 as gallery_1,
        //     casts.age as age,
        //     casts.height as height,
        //     casts.bust as bust,
        //     casts.waist as waist,
        //     casts.hip as hip,
        //     casts.appeal_point as personality,
        //     shops.name as shop_name,
        //     shops.slug as shop_slug
        //     ") // 必要に応じて
        // ->get();
        // dd($casts);
        return view('public.group.schedule', [
            'days' => $days,
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank', 'asc')->get(),
            // 'casts' => $casts,
        ]);
    }

    public function showEvent(Request $request): View
    {
        $events = Event::where('published_status', 1)
            ->where('shop_id', Shop::where('slug', 'headquarter')->first()->id)
            ->orWhere(function($query) {
                $query->where('published_status', 2)
                    ->where('published_at', '<=', Carbon::now());
            })
            ->orWhere('published_status',4)
            ->where('published_at', '>=', Carbon::now()->subMonth(1))
            ->orderBy('published_at', 'desc')
            ->get();        // $events = Event::where('published_status', 1)
        // ->where('shop_id', Shop::where('slug', 'headquarter')->first()->id)
        // ->orWhere(function($query) {
        //     $query->where('published_status', 2)
        //         ->where('published_at', '<=', Carbon::now());
        // })
        // ->orderBy('published_at', 'desc')
        // ->get();
        return view('public.group.event', [
            'events' => $events,
        ]);
    }
    public function showEventDetail(Request $request, string $id): View
    {
        $event = Event::find($id);
        return view('public.group.eventDetail', [
            'event' => $event,
        ]);
    }
    public function showSearch(Request $request): View
    {
        $personalities = Personality::where('is_public', true)->get();
        $styles = Style::where('is_public', true)->get();
        $options = Option::where('is_public', true)->get();
        return view('public.group.search', [
            'personalities' => $personalities,
            'styles' => $styles,
            'options' => $options,

        ]);
    }

    public function showPickup(Request $request): View
    {
        $pickups = Pickup::with('cast')->whereHas('cast', function ($query) {
            $query->where('is_public', true);
        })->get();

        return view('public.group.pickup', [
            'pickups' => $pickups,
        ]);
}

    public function showPrivacyPolicy(Request $request): View
    {
        return view('public.group.privacy-policy', [
        ]);
    }
    public function showPersonalPolicy(Request $request): View
    {
        return view('public.group.personal-policy', [
        ]);
    }
    public function showNewcomer(Request $request): View
    {
        // $newcomers = Cast::leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
        //         ->where('shops.slug', '!=', 'touchvip')
        //         ->where('shops.slug', '!=', 'headquarter')
        //         ->where('casts.is_public', 1)
        //         ->where('casts.created_at', '>=', Carbon::now()->subMonth(1))
        //         ->inRandomOrder()
        //         ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
        //         ->onEachSide(0)
        //         ->withPath('newcomer')
        //         ->selectRaw('casts.*',
        //         'shops.name as shop_name',
        //         'shops.slug as shop_slug',
        //         'shops.id as shop_id'
        //         );

        //  dd($newcomers);
        $cast_query = Cast::whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)
        ->whereNot('shop_id', Shop::where('slug', 'headquarter')->first()->id);
        $newcomers = $cast_query
            ->where('joined_at', '>=', Carbon::now()->subMonth(1))
            ->where('is_public', 1)
            ->inRandomOrder()
            ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
            ->onEachSide(0)
            ->withPath('newcomer');

        return view('public.group.newcomer', [
            'newcomers' => $newcomers,
        ]);
    }

    public function searchResult(Request $request): View
    {
        if ($request->isMethod('post')) {
            $names = $request->input('name');
            $name_match =$request->input('name_match');
            $personalities = $request->input('personality');
            $styles = $request->input('style');
            $options = $request->input('option');
            $age = $request->input('age');
            $height = $request->input('height');
            $bust = $request->input('bust');
            $status = $request->input('status');
            $shop_id = $request->input('selectedShopID') ?? "";
            $date = $request->input('selectedDate') ?? "";
        }else if ($request->isMethod('get')){
            $names = $request->query('name');
            $name_match =$request->query('name_match');
            $personalities = $request->query('personality');
            $styles = $request->query('style');
            $options = $request->query('option');
            $age = $request->query('age');
            $height = $request->query('height');
            $bust = $request->query('bust');
            $status = $request->query('status');
            $shop_id = $request->query('selectedShopID') ?? "";
            $date = $request->query('selectedDate') ?? "";

            // dd($names, $name_match, $personalities, $styles, $options, $age, $height, $bust, $status);
        }
        // dd($date);
        /*
        $page = $request->input('page');
        $limit = $request->input('limit');
        $skip = $request->input('skip');
        $pages = $request->input('pages');
        $total = $request->input('total');
        */
        $query = Cast::query();

        $query->leftjoin('cast_option', 'casts.id', '=', 'cast_option.cast_id');
        $query->leftjoin('cast_personality', 'casts.id', '=', 'cast_personality.cast_id');
        $query->leftjoin('cast_style', 'casts.id', '=', 'cast_style.cast_id');
        $query->leftjoin('shops', 'casts.shop_id', '=', 'shops.id');

        if ($status == 'working') {
            $query->leftjoin('attendances', 'casts.id', '=', 'attendances.cast_id')
            ->where('attendances.is_public', 1);
            if ( $date != ""){
                $query->whereDate('attendances.start_datetime', '<=', $date)
                ->whereDate('attendances.end_datetime', '>=', $date);
            }else{
                $query->whereDate('attendances.start_datetime', '<=', Carbon::now())
                ->whereDate('attendances.end_datetime', '>=', Carbon::now());
            }
        }

        $query->where('casts.is_public', 1);
        // 名前を空白文字で分割
        // $nameArray = preg_split('/[\s　]+/', $names, -1, PREG_SPLIT_NO_EMPTY);
        $namess = mb_convert_kana($names, 's');
        $nameArray = explode(' ', $namess);
        $nameArray = array_filter($nameArray, 'strlen');

        if ($name_match == 'partial') {
            $query->where(function($query) use ($nameArray) {
                foreach ($nameArray as $name) {
                    $query->orWhere('casts.name', 'like', "%$name%");
                }
            });
        } else if ($name_match == 'full') {
            $query->where(function($query) use ($nameArray) {
                foreach ($nameArray as $name) {
                    $query->Where('casts.name', 'like', "%$name%");
                }
            });
        }
        // dd($query->get());
        switch ($height) {
            case '150':
                $query->where('casts.height', '<=', 150);
                break;
            case '155':
                $query->where('casts.height', '<=', 155)
                ->where('casts.height', '>', 150);
                break;
            case '160':
                $query->where('casts.height', '<=', 160)
                ->where('casts.height', '>', 155);
                break;
            case '165':
                $query->where('casts.height', '<=', 165)
                ->where('casts.height', '>', 160);
                break;
            case '170':
                $query->where('casts.height', '>=', 170);
                break;
            default:
                break;
        }
        switch ($age) {
            case '18':
                $query->where('casts.age', '=', 18);
                break;
            case '19':
                $query->where('casts.age', '=', 19);
                break;
            case '20':
                $query->where('casts.age', '=', 20);
                break;
            case '21':
                $query->where('casts.age', '=', 21);
                break;
            case '22':
                $query->where('casts.age', '=', 22);
                break;
            case '23':
                $query->where('casts.age', '=', 23);
                break;
            case '24':
                $query->where('casts.age', '=', 24);
                break;
            case '25':
                $query->where('casts.age', '=', 25);
                break;
            case '26':
                $query->where('casts.age', '=', 26);
                break;
            case '27':
                $query->where('casts.age', '=', 27);
                break;
            case '28':
                $query->where('casts.age', '=', 28);
                break;
            case '29':
                $query->where('casts.age', '=', 29);
                break;
            case '30':
                $query->where('casts.age', '>=', 30);
                break;
            default:
                break;
        }
        // dd($bust);
        switch ($bust) {
            case 'A':
                $query->where('casts.bra_size', '=', 'A');
                break;
            case 'B':
                $query->where('casts.bra_size', '=', 'B');
                break;
            case 'C':
                $query->where('casts.bra_size', '=', 'C');
                break;
            case 'D':
                $query->where('casts.bra_size', '=', 'D');
                break;
            case 'E':
                $query->where('casts.bra_size', '=', 'E');
                break;
            case 'F':
                $query->where('casts.bra_size', '=', 'F');
                break;
            case 'G':
                $query->where('casts.bra_size', '=', 'G');
                break;
            case 'H':
                $query->where('casts.bra_size', '=', 'H');
                break;
            case 'I':
                $query->where('casts.bra_size', '=', 'I');
                break;
            case 'J':
                $query->where('casts.bra_size', '=', 'J');
                break;
            default:
                break;
        }

        if ($personalities != -1 && $personalities != "" && $personalities != null ) {
            dd($personalities);
            $query->where('cast_personality.personality_id', $personalities);
        }
        // dd($personalities);
        if ($styles != -1 && $styles != "" && $styles != null) {
            $query->where('cast_style.style_id', $styles);
        }

        if ($options != -1 && $options != "" && $options != null) {
            $query->where('cast_option.option_id', $options);
        }

        if ($shop_id != "") {
            $query->where('casts.shop_id','=', $shop_id);
        }

        $shops = Shop::where('slug', 'touchvip')->orWhere('slug', 'headquarter')->orderBy('rank', 'asc')->get();
        foreach ($shops as $shop) {
            $query->whereNot('casts.shop_id', $shop->id);
        }
        // dd($shop_id,$options,$styles);
        // if ($date != null || $date != "") {
        //     $query->whereDate('attendances.start_datetime', '=', $date);
        // }
        // dd($shop_id, $date);
        $query->groupBy('casts.id');
        $query->select('casts.*', 'shops.name as shop_name', 'shops.slug as shop_slug');
        // dd($query->toSql());
        if ( $date == ""){
            $date = Carbon::now()->format('Y-m-d');
        }
        $search_result = $query->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 9 : 12)
        ->appends([
            'names' => $names,
            'name_match' => $name_match,
            'personalities' => $personalities,
            'styles' => $styles,
            'options' => $options,
            'age' => $age,
            'height' => $height,
            'bust' => $bust,
            'status' => $status,
            'selectedShopID' => $shop_id,
            'selectedDate' => $date,
        ])
        ->onEachSide(0)
        ->withPath('searchResult');
        // dd($search_result);


        Carbon::setLocale('ja');
        $today = Carbon::now()->format('Y-m-d');
        $days = array();
        $weekDay = Carbon::now()->format('m/d').'('.Carbon::now()->getTranslatedMinDayName().')';
        $days[0] = ['date'=>$today,'weekDay'=>$weekDay];
        for ($i = 1; $i < 7; $i++) {
            $date_tmp = Carbon::now()->addDays($i)->format('Y-m-d');
            $weekDay = Carbon::now()->addDays($i)->format('m/d').'('.Carbon::now()->addDays($i)->getTranslatedMinDayName().')';
            $days[$i] = ['date'=>$date_tmp,'weekDay'=>$weekDay] ;
        }

        return view('public.group.searchResult', [
            'search_result' => $search_result,
            'days' => $days,
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank', 'asc')->get(),
            'names' => $names,
            'name_match' => $name_match,
            'personalities' => $personalities,
            'styles' => $styles,
            'options' => $options,
            'age' => $age,
            'height' => $height,
            'bust' => $bust,
            'status' => $status,
            'selectedShopID' => $shop_id,
            'selectedDate' => $date,
        ]);
    }
    public function showMypage(Request $request)
    {
        $member = Auth::guard('member')->user();
        $pay = 0;
        $histories = [];
        if ($member) {
            // $member = Member::find($id);
            // $today_point = Point::where('user_id', $member->id)->whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))
            //               ->where('type', 3)
            //               ->sum('point');
            $point_pay = Point::where('user_id', $member->id)->where('type', 3)->sum('point');
            $point_use = Point::where('user_id', $member->id)->where('type', 5)->sum('point');
            $today_point = $point_pay - $point_use;

            $histories = History::where('user_id', $member->id)
                          ->whereIn('name', ['来店', 'PT有効期限切れ'])
                          ->orderBy('created_at', 'desc')
                          ->orderBy('id', 'desc')
                          ->get();
            if ($histories) {
              $histories = $histories->map(function ($history) {
                $history->casts_name = Cast::where('id', $history->cast_id)->first()->name ?? '';
                $history->course_name_table = Course::where('id', $history->course_id)->first()->name ?? '';
                $history->shop_name = Shop::where('id', $history->shop_id)->first()->name ?? '';
                $history->point_pay = Point::where('history_id', $history->id)->where('type', 3)->sum('point') ?? 0;
                $history->point_use = Point::where('history_id', $history->id)->where('type', 5)->sum('point') ?? 0;
                $history->review_id = Review::where('history_id', $history->id)->where('is_public', 1) ?? 0;
                return $history;
              });
            }

            $shop_histories = History::where('user_id', $member->id)
            ->whereIn('name', ['来店', 'PT有効期限切れ'])
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            // ->limit(3)
            ->get();

            if ($shop_histories) {
                $shop_histories = $shop_histories->map(function ($history) {
                  $history->casts_name = Cast::where('id', $history->cast_id)->first()->name ?? '';
                  $history->history_id = Review::where('history_id', $history->id)->first()->id ?? 0;
                  $history->shop_name = Shop::where('id', $history->shop_id)->first()->name ?? '';
                  return $history;
                });
            }

            $url = "http://plo-group.jp/admin/member/qrresult?qr={$member->id}";
            $qrCode = new QrCode(
              data: $url,
              encoding: new Encoding('UTF-8'),
              size: 200,
              margin: 0,
            );

            $writer = new PngWriter();
            $result = $writer->write($qrCode);

            return view('public.mypage', [
                'today_point' => $today_point,
                'member' => $member,
                'histories' => $histories,
                'shop_histories' => $shop_histories,
                'qr_code' => $result->getDataUri(),
            ]);
        } else {
            return redirect('/');
        }
    }
    public function wirteReview(Request $request)
    {
        $member = Auth::guard('member')->user();
        $token = Auth::guard('member')->user()->createToken('mypage')->plainTextToken;
        $history_id = $request->query('history_id');
        $history = History::find($history_id);
        $cast_id = $history->cast_id;
        $cast = Cast::find($cast_id);
        if ($member) {
            return view('public.review', [
                'member' => $member,
                'token' => $token,
                'history_id' => $history_id,
                'cast' => $cast,
            ]);
        } else {
            return redirect('/');
        }
    }
    public function showNewsList(Request $request, string $shop): View
    {
        if($shop == 'all'){
            $news = News::leftJoin('shops', 'news.shop_id', '=', 'shops.id')
            ->whereNot('shops.slug', 'touchvip')
            ->where('published_status', 1)
            ->orWhere(function($query) {
                $query->where('published_status', 2)
                    ->where('published_at', '<=', Carbon::now());
            })
            ->select('news.*', 'shops.slug as shop_slug', 'shops.id as shop_id')
            ->orderBy('published_at', 'desc')
            ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
            ->onEachSide(0)
            ->withPath('newslist');
        }else{
            $news = News::leftJoin('shops', 'news.shop_id', '=', 'shops.id')
            ->where('shops.slug', $shop)
            ->where('published_status', 1)
            ->orWhere(function($query) {
                $query->where('published_status', 2)
                    ->where('published_at', '<=', Carbon::now());
            })
            ->select('news.*', 'shops.slug as shop_slug', 'shops.id as shop_id')
            ->orderBy('published_at', 'desc')
            ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
            ->onEachSide(0)
            ->withPath('newslist');
        }
        // dd($news);
        return view('public.group.newslist', [
            'news' => $news,
        ]);
    }
    public function showNewsDetail(Request $request, string $shop, string $id): View
    {
        $news = News::find($id);
        return view('public.group.newsdetail', [
            'news' => $news,
        ]);
    }

    public function showTwitter(Request $request)
    {
        $url = $request->query('url');

        $response = Http::widthHeader([
           'User-Agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Mobile/15E148 Safari/604.1'
        ])->get($url);

        return response($response->body(),$response->status(),$response->headers('Content-Type', $response->header('Content-Type')));
    }

    public function showMemberInfo(Request $request)
    {
        $member = Auth::guard('member')->user();
        return view('public.memberinfo', [
            'member' => $member,
        ]);
    }
    public function updateMemberInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tel' => 'required',
            'email' => 'required|email',
        ],[
            'name.required' => 'ニックネームを入力してください。',
            'tel.required' => '電話番号を入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスが不正です。',
        ]);
        if ($validator->fails()) {
            return redirect()->route('public.group.memberinfo')->withErrors($validator)->withInput();
        }
        $member = Auth::guard('member')->user();
        $member->name = $request->name;
        $member->tel = $request->tel;
        $member->email = $request->email;
        $member->save();
        return redirect()->route('public.group.memberinfo');
    }
    public function showPassword(Request $request)
    {
        $member = Auth::guard('member')->user();
        return view('public.password', [
            'member' => $member,
        ]);
    }
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ],[
            'password.required' => '以前のパスワードを入力してください。',
            'new_password.required' => '新しいパスワードを入力してください。',
            'new_password.confirmed' => '新しいパスワードが一致しません。',
            'new_password.min' => '新しいパスワードは8文字以上で入力してください。',
        ]);
        if ($validator->fails()) {
            return redirect()->route('public.group.password')->withErrors($validator)->withInput();
        }
        $member = Auth::guard('member')->user();
        if (Hash::check($request->password, $member->password)) {
            $member->password = Hash::make($request->new_password);
            $member->save();
            return redirect()->route('public.group.password')->with('success', 'パスワードを変更しました。');
        } else {
            return redirect()->route('public.group.password')->withErrors(['password' => '以前のパスワードが間違っています。']);
        }
    }
}
