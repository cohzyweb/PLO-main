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

class GroupsController extends Controller
{
    /**
     * Display the group home page.
     */
    public function showHome(Request $request): View
    {
        $cast_query = Cast::leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
        ->whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)->whereNot('shop_id', Shop::where('slug', 'headquarter')->first()->id);
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
            ->select([
                'casts.id as id',
                'casts.name as name',
                'casts.age as age',
                'casts.height as height',
                'casts.bust as bust',
                'casts.waist as waist',
                'casts.hip as hip',
                'casts.bra_size as bra',
                'casts.gallery_1 as gallery_1',
                'casts.gallery_2 as gallery_2',
                'casts.gallery_3 as gallery_3',
                'casts.gallery_4 as gallery_4',
                'casts.gallery_5 as gallery_5',
                'casts.gallery_6 as gallery_6',
                'casts.joined_at as joined_at',
                'casts.appeal_point as appeal_point',
                'shops.slug as shop_slug',
                'shops.name as shop_name',
            ]) // 必要に応じて明示
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

        $diaries = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
            ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
            ->where('diaries.is_public', 1)
            ->where('casts.is_public', 1)
            ->whereNot('shops.slug', 'touchvip')
            ->whereNot('shops.slug', 'headquarter')
            ->orderBy('diaries.updated_at', 'desc')
            ->orderBy('diaries.id', 'desc')
            ->select([
                'diaries.id as id',
                'diaries.subject',
                DB::raw('DATE_FORMAT(diaries.updated_at, "%m/%d %H:%i") as updated_at'),
                'casts.name',
                'diaries.photo',
                'casts.id as cast_id',
                'casts.gallery_1 as gallery_1',
                'casts.age as cast_age',
                'casts.height as cast_height',
                'casts.bust as cast_bust',
                'casts.waist as cast_waist',
                'casts.hip as cast_hip',
                'casts.bra_size as cast_bra',
                'shops.slug as shop_slug',
                'shops.name as shop_name',
            ])
            ->limit(6)
            ->get();
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
        ->limit($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 3 : 6)
        ->select('videos.*','casts.*','shops.slug as shop_slug','shops.name as shop_name')
        ->get();
        // dd($videos);
        $shops = Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank', 'asc')->get();
        // dd($diaries);
        $pickups = Pickup::leftJoin('casts', 'pickups.cast_id', '=', 'casts.id')
        ->leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
        // ->leftJoin('attendances', 'attendances.cast_id', '=', 'casts.id')
        ->where('casts.is_public', 1)
        // ->where('attendances.is_public', 1)
        ->inRandomOrder()
        // ->limit(9)
        ->select([
            'casts.id as id',
            'casts.name as name',
            'casts.age as age',
            'casts.height as height',
            'casts.bust as bust',
            'casts.waist as waist',
            'casts.hip as hip',
            'casts.bra_size as bra',
            'casts.gallery_1 as gallery_1',
            'casts.appeal_point as appeal_point',
            'casts.manager_comment as manager_comment',
            // 'attendances.start_datetime as start_datetime',
            // 'attendances.end_datetime as end_datetime',
            'shops.slug as shop_slug',
            'shops.name as shop_name',
            ])
        ->limit($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
        ->get();
        if ($pickups) {
            $pickups = $pickups->map(function ($pickup) {
                $attendance = Attendance::where('cast_id', $pickup->id)
                    ->where('is_public', 1)
                    ->whereRaw('DATE(start_datetime) = CURDATE()')
                    ->first();

                $pickup->schedule_status = $attendance && $attendance->start_datetime
                    ? '本日出勤中'
                    : '本日お休み';

                // $pickup->end_datetime = Attendance::where('cast_id', $pickup->id)->where('is_public', 1)->whereRaw('start_datetime <= NOW()')->whereRaw('end_datetime >= NOW()')->first()->end_datetime ?? '';

                return $pickup;
            });
        }

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
            'casts.bra_size as bra',
            'casts.gallery_1 as gallery_1',
            'casts.appeal_point as appeal_point',
            'attendances.start_datetime as start_datetime',
            'attendances.end_datetime as end_datetime',
            'shops.slug as shop_slug',
            'shops.name as shop_name',
            ]) // 必要に応じて明示的に
        ->inRandomOrder()
        // ->limit(9)
        ->limit($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 8 : 9)
        ->get();
        // dd($todayCasts);
        // $url = 'https://x.com/ShizukuHealth';
        // $response = Http::withHeader('User-Agent', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Mobile/15E148 Safari/604.1')
        //     ->get($url);
        // $shizukuX = $response->body();
        // dd($diaries);
        return view('public.groups.home', [
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
        return view('public.groups.home', [
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
        $shops = Shop::whereNot('slug', 'touchvip')
            ->whereNot('slug', 'headquarter')
            ->orderBy('rank', 'asc')
            ->get();

        // Card images (fallbacks) used on the Groups "Shop List" page.
        $shopImages = [
            'shizuku' => 'assets/img/shops/shizuku/001.jpg',
            'pussycat' => 'assets/img/shops/shizuku/002.jpg',
            'miyabi' => 'assets/img/shops/shizuku/003.jpg',
            'siroganeze' => 'assets/img/shops/shizuku/005.jpg',
            'en' => 'assets/img/shops/shizuku/004.jpg',
            'lovestory' => 'assets/img/shops/shizuku/006.jpg',
        ];

        // Descriptions (fallbacks) used on the Groups "Shop List" page.
        $shopDescriptions = [
            'shizuku' => '雫は、札幌の歓楽街「すすきの」でハイレベルな女性のみが在籍する高級ヘルス。ススキノに数多くあるヘルス街から少し離れた場所にあり、外観もオシャレな見た目となっています。また他のお客様と目が合わぬよう、それぞれ仕切りで独立した待合スペースをご用意しております。',
            'pussycat' => 'プッシーキャットは、すすきので屈指の開店前から長蛇の列ができる有名ヘルスです。その理由は、女の子を実際に目で見てから選べる他店にはないシステム。札幌のみならず全国でも有名なお店となっており、お仲間と入場するだけでも、これまでに味わったことのない楽しい時間を過ごすことができます。',
            'miyabi' => '雅は、王様イスを使った密着洗体が人気のラグジュアリーなヘルスです。淡白なサービスではなく、濃厚で肌と肌が触れ合う密着度が高いサービスを求めている貴方にはぴったり。エロさ×密着度300％で快楽に溺れられる空間です。',
            'lovestory' => 'ラブストーリーは、20代前半のあどけない美少女を育てられる育成型ヘルスです。男性経験が少ないけど、大人の世界を知りたい…そんな女の子を成長させられる楽しみがある新感覚ヘルスになっています。料金もリーズナブルなので、推しの女の子を探して、自分色に染めてみませんか？',
            'en' => 'ファッションヘルス「艶〜エン〜」は、人妻や若妻などの大人女性によるヘルスサービスが楽しめるお店。サラリーマンや学生の方でも、ご来店頂きやすい激安料金システムが魅力。',
            'siroganeze' => 'シロガネーゼは、ススキノ屈指の腕前を持つセラピストが在籍するプレミアムメンズエステです。体のコリをほぐす本格的なアロママッサージと共に、回春サービスが一緒なので全身をリフレッシュしたい方にオススメのお店となっております。',
        ];

        return view('public.groups.shop', [
            'shops' => $shops,
            'shopImages' => $shopImages,
            'shopDescriptions' => $shopDescriptions,
        ]);
    }

    public function showSchedule(Request $request): View
    {
        Carbon::setLocale('ja');

        // Get selected date from request or default to today
        $selectedDate = $request->query('date', Carbon::now()->format('Y-m-d'));
        $selectedCarbon = Carbon::parse($selectedDate);

        // Get selected shop from request
        $selectedShop = $request->query('shop', '');

        // Format the search heading with the selected date
        $searchHeading = $selectedCarbon->format('m/d') . '（' . $selectedCarbon->getTranslatedMinDayName() . '）の出勤女性';

        // Generate date search dates (next 6 days)
        $dateSearchDates = [];
        for ($i = 0; $i < 6; $i++) {
            $date = Carbon::now()->addDays($i);
            $dateSearchDates[] = [
                'date' => $date->format('Y-m-d'),
                'display' => $date->format('m/d'),
                'label' => $date->format('m/d')
            ];
        }

        // Fetch casts with attendance for the selected date
        $query = Attendance::leftJoin('casts', 'attendances.cast_id', '=', 'casts.id')
            ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
            ->where('casts.is_public', 1)
            ->where('attendances.is_public', 1)
            ->whereRaw('DATE(attendances.start_datetime) = ?', [$selectedDate])
            ->whereNot('shops.slug', 'touchvip')
            ->whereNot('shops.slug', 'headquarter');

        // Filter by shop if selected
        if ($selectedShop !== '') {
            $shop = Shop::where('slug', $selectedShop)->first();
            if ($shop) {
                $query->where('casts.shop_id', $shop->id);
            }
        }

        $casts = $query->select([
            'casts.id as id',
            'casts.name as name',
            'casts.age as age',
            'casts.height as height',
            'casts.bust as bust',
            'casts.bra_size as bra_size',
            'casts.waist as waist',
            'casts.hip as hip',
            'casts.gallery_1 as gallery_1',
            'casts.appeal_point as appeal_point',
            DB::raw("DATE_FORMAT(attendances.start_datetime, '%H:%i') as start_datetime"),
            DB::raw("DATE_FORMAT(attendances.end_datetime, '%H:%i') as end_datetime"),
            'shops.slug as shop_slug',
            'shops.name as shop_name',
        ])
        ->orderBy('shops.rank', 'asc')
        ->orderBy('casts.name', 'asc')
        ->get()
        ->map(function ($cast) {
            // Format time range
            $cast->time_range = ($cast->start_datetime ?? '') . '〜' . ($cast->end_datetime ?? '');
            $cast->status_text = '本日出勤';
            $cast->is_working_today = true;
            return $cast;
        });

        // Button group (2 rows of 3) - used by the shared sub page layout.
        // For schedule page, buttons work as form submit buttons (like newface page)
        $buttonGroup = [
            [
                ['shop' => 'shizuku', 'image' => 'assets/img/groups/photo-diary-button1.png', 'alt' => 'Shizuku', 'class' => 'all-shops-button--shizuku'],
                ['shop' => 'siroganeze', 'image' => 'assets/img/groups/photo-diary-button2.png', 'alt' => 'Siroganeze'],
                ['shop' => 'lovestory', 'image' => 'assets/img/groups/photo-diary-button3.png', 'alt' => 'Love Story'],
            ],
            [
                ['shop' => 'pussycat', 'image' => 'assets/img/groups/photo-diary-button4.png', 'alt' => 'Pussycat', 'class' => 'all-shops-button--pussycat'],
                ['shop' => 'miyabi', 'image' => 'assets/img/groups/photo-diary-button5.png', 'alt' => 'Miyabi', 'class' => 'all-shops-button--miyabi'],
                ['shop' => 'en', 'image' => 'assets/img/groups/photo-diary-button6.png', 'alt' => 'En'],
            ],
        ];

        return view('public.groups.schedule', [
            'searchHeading' => $searchHeading,
            'dateSearchDates' => $dateSearchDates,
            'selectedDate' => $selectedDate,
            'buttonGroup' => $buttonGroup,
            'casts' => $casts,
        ]);
    }

    public function showEvent(Request $request): View
    {
        // Get shops for validation
        $shops = Shop::whereNot('slug', 'touchvip')
            ->whereNot('slug', 'headquarter')
            ->orderBy('rank', 'asc')
            ->get(['id', 'name', 'slug']);

        $allowedSlugs = $shops->pluck('slug')->all();
        $selectedShop = (string) $request->query('shop', '');
        if ($selectedShop !== '' && !in_array($selectedShop, $allowedSlugs, true)) {
            $selectedShop = '';
        }

        // Build event query - similar to original but with shop filtering
        $headquarterShopId = Shop::where('slug', 'headquarter')->first()->id;

        $eventQuery = Event::with('shop')
            ->leftJoin('shops', 'events.shop_id', '=', 'shops.id')
            ->where(function($query) use ($headquarterShopId, $selectedShop) {
                // Published status 1 (headquarter shop events) - only when no shop filter
                if ($selectedShop === '') {
                    $query->where(function($q) use ($headquarterShopId) {
                        $q->where('events.published_status', 1)
                          ->where('events.shop_id', $headquarterShopId);
                    });
                }
                // Published status 2 (scheduled, published)
                $query->orWhere(function($q) {
                    $q->where('events.published_status', 2)
                      ->where('events.published_at', '<=', Carbon::now());
                })
                // Published status 4 (recently published)
                ->orWhere(function($q) {
                    $q->where('events.published_status', 4)
                      ->where('events.published_at', '>=', Carbon::now()->subMonth(1));
                });
            })
            ->whereNot('shops.slug', 'touchvip');

        // Filter by shop if selected
        if ($selectedShop !== '') {
            $shop = Shop::where('slug', $selectedShop)->first();
            if ($shop) {
                $eventQuery->where('events.shop_id', $shop->id);
            }
        } else {
            // When no shop selected, exclude headquarter from individual shop events list
            // (headquarter events with published_status 1 are already included above)
            $eventQuery->where(function($q) use ($headquarterShopId) {
                $q->where('events.shop_id', $headquarterShopId)
                  ->orWhere('events.shop_id', '!=', $headquarterShopId);
            });
        }

        $events = $eventQuery
            ->select('events.*')
            ->orderBy('events.published_at', 'desc')
            ->get();

        // Generate date search dates (next 6 days)
        $dateSearchDates = [];
        for ($i = 0; $i < 6; $i++) {
            $date = Carbon::now()->addDays($i);
            $dateSearchDates[] = [
                'date' => $date->format('Y-m-d'),
                'display' => $date->format('m/d'),
                'label' => $date->format('m/d')
            ];
        }

        // Button group (2 rows of 3) - used by the shared sub page layout.
        // Form-based filtering (like newface and schedule pages)
        $buttonGroup = [
            [
                ['shop' => 'shizuku', 'image' => 'assets/img/groups/photo-diary-button1.png', 'alt' => 'Shizuku', 'class' => 'all-shops-button--shizuku'],
                ['shop' => 'siroganeze', 'image' => 'assets/img/groups/photo-diary-button2.png', 'alt' => 'Siroganeze'],
                ['shop' => 'lovestory', 'image' => 'assets/img/groups/photo-diary-button3.png', 'alt' => 'Love Story'],
            ],
            [
                ['shop' => 'pussycat', 'image' => 'assets/img/groups/photo-diary-button4.png', 'alt' => 'Pussycat', 'class' => 'all-shops-button--pussycat'],
                ['shop' => 'miyabi', 'image' => 'assets/img/groups/photo-diary-button5.png', 'alt' => 'Miyabi', 'class' => 'all-shops-button--miyabi'],
                ['shop' => 'en', 'image' => 'assets/img/groups/photo-diary-button6.png', 'alt' => 'En'],
            ],
        ];

        return view('public.groups.event', [
            'events' => $events,
            'dateSearchDates' => $dateSearchDates,
            'selectedDate' => $request->query('date'),
            'selectedShop' => $selectedShop,
            'buttonGroup' => $buttonGroup,
        ]);
    }
    public function showEventDetail(Request $request, string $id): View
    {
        $event = Event::with('shop')->findOrFail($id);

        $headquarterShopId = Shop::where('slug', 'headquarter')->first()->id;

        // Get previous event
        $prevEvent = Event::where('id', '<', $event->id)
            ->where(function($query) use ($headquarterShopId) {
                $query->where(function($q) use ($headquarterShopId) {
                    $q->where('published_status', 1)
                      ->where('shop_id', $headquarterShopId);
                })
                ->orWhere(function($q) {
                    $q->where('published_status', 2)
                      ->where('published_at', '<=', Carbon::now());
                })
                ->orWhere(function($q) {
                    $q->where('published_status', 4)
                      ->where('published_at', '>=', Carbon::now()->subMonth(1));
                });
            })
            ->whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)
            ->orderBy('id', 'desc')
            ->first();

        // Get next event
        $nextEvent = Event::where('id', '>', $event->id)
            ->where(function($query) use ($headquarterShopId) {
                $query->where(function($q) use ($headquarterShopId) {
                    $q->where('published_status', 1)
                      ->where('shop_id', $headquarterShopId);
                })
                ->orWhere(function($q) {
                    $q->where('published_status', 2)
                      ->where('published_at', '<=', Carbon::now());
                })
                ->orWhere(function($q) {
                    $q->where('published_status', 4)
                      ->where('published_at', '>=', Carbon::now()->subMonth(1));
                });
            })
            ->whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('public.groups.eventDetail', [
            'event' => $event,
            'prevEvent' => $prevEvent,
            'nextEvent' => $nextEvent,
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

    // public function showPickup(Request $request): View
    // {
    //     $pickups = Pickup::with('cast')->whereHas('cast', function ($query) {
    //         $query->where('is_public', true);
    //     })->get();

    //     return view('public.group.pickup', [
    //         'pickups' => $pickups,
    //     ]);
    // }

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

    /**
     * Display the photo diary page.
     */
    public function showPhotoDiary(Request $request): View
    {
        // Build diary query - fetch from all shops except touchvip and headquarter
        $query = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
            ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
            ->where('diaries.is_public', 1)
            ->where('casts.is_public', 1)
            ->whereNot('shops.slug', 'touchvip')
            ->whereNot('shops.slug', 'headquarter')
            ->select([
                'diaries.id',
                'diaries.subject',
                'diaries.photo',
                'diaries.body',
                'diaries.created_at',
                'diaries.updated_at',
                'casts.id as cast_id',
                'casts.name as cast_name',
                'casts.age',
                'casts.height',
                'casts.bust',
                'casts.waist',
                'casts.hip',
                'casts.bra_size',
                'casts.gallery_1',
                'shops.id as shop_id',
                'shops.name as shop_name',
                'shops.slug as shop_slug',
            ]);

        // Build query for calendar dates
        $query_date = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
            ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
            ->where('diaries.is_public', 1)
            ->where('casts.is_public', 1)
            ->whereNot('shops.slug', 'touchvip')
            ->whereNot('shops.slug', 'headquarter')
            ->selectRaw("DATE_FORMAT(diaries.created_at, '%Y-%m-%d') as date, diaries.id");

        // Filter by month if provided (format: YYYY-MM)
        $month = $request->input('month', '');
        if ($month != '') {
            $query->whereRaw("DATE_FORMAT(diaries.created_at, '%Y-%m') = ?", [$month]);
            $query_date->whereRaw("DATE_FORMAT(diaries.created_at, '%Y-%m') = ?", [$month]);
        }

        // Filter by date if provided (takes precedence over month)
        $date = $request->input('date', '');
        if ($date != '') {
            $query->whereDate('diaries.created_at', $date);
            $query_date->whereDate('diaries.created_at', $date);
            // Extract month from date for highlighting
            $month = substr($date, 0, 7);
        }

        // Paginate diaries
        $diaries = $query->orderBy('diaries.created_at', 'desc')
            ->orderBy('diaries.id', 'desc')
            ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 8)
            ->onEachSide(0)
            ->appends([
                'date' => $date,
                'month' => $month,
            ])
            ->withPath('photodiary');

        // Get dates for calendar (grouped by date)
        $diarys_date = $query_date->groupBy('date')
            ->get();

        // Get available months for monthly picker (grouped by year-month)
        $availableMonths = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
            ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
            ->where('diaries.is_public', 1)
            ->where('casts.is_public', 1)
            ->whereNot('shops.slug', 'touchvip')
            ->whereNot('shops.slug', 'headquarter')
            ->selectRaw("DATE_FORMAT(diaries.created_at, '%Y-%m') as month")
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->get()
            ->pluck('month')
            ->toArray();

        // Button group (2 rows of 3) - used by the shared sub page layout.
        $buttonGroup = [
            [
                ['shop' => 'shizuku', 'image' => 'assets/img/groups/photo-diary-button1.png', 'alt' => 'Shizuku', 'class' => 'all-shops-button--shizuku'],
                ['shop' => 'siroganeze', 'image' => 'assets/img/groups/photo-diary-button2.png', 'alt' => 'Siroganeze'],
                ['shop' => 'lovestory', 'image' => 'assets/img/groups/photo-diary-button3.png', 'alt' => 'Love Story'],
            ],
            [
                ['shop' => 'pussycat', 'image' => 'assets/img/groups/photo-diary-button4.png', 'alt' => 'Pussycat', 'class' => 'all-shops-button--pussycat'],
                ['shop' => 'miyabi', 'image' => 'assets/img/groups/photo-diary-button5.png', 'alt' => 'Miyabi', 'class' => 'all-shops-button--miyabi'],
                ['shop' => 'en', 'image' => 'assets/img/groups/photo-diary-button6.png', 'alt' => 'En'],
            ],
        ];

        // Determine current month for highlighting
        $currentMonth = $month ?: (now()->format('Y-m'));

        return view('public.groups.photodiary', [
            'diaries' => $diaries,
            'diarys_date' => $diarys_date,
            'date' => $date,
            'month' => $month,
            'currentMonth' => $currentMonth,
            'availableMonths' => $availableMonths,
            'buttonGroup' => $buttonGroup,
        ]);
    }
    public function showNewFace(Request $request): View
    {
        Carbon::setLocale('ja');

        // Get selected date from request
        $selectedDate = $request->query('date', '');

        $shops = Shop::whereNot('slug', 'touchvip')
            ->whereNot('slug', 'headquarter')
            ->orderBy('rank', 'asc')
            ->get(['id', 'name', 'slug']);

        $allowedSlugs = $shops->pluck('slug')->all();
        $selectedShop = (string) $request->query('shop', '');
        if ($selectedShop !== '' && !in_array($selectedShop, $allowedSlugs, true)) {
            $selectedShop = '';
        }

        $castQuery = Cast::leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
            ->where('casts.is_public', 1)
            ->whereNot('casts.shop_id', Shop::where('slug', 'touchvip')->first()->id)
            ->whereNot('casts.shop_id', Shop::where('slug', 'headquarter')->first()->id)
            ->when($selectedShop !== '', function ($q) use ($selectedShop) {
                $q->where('shops.slug', $selectedShop);
            })
            ->when($selectedDate !== '', function ($q) use ($selectedDate) {
                // Filter by specific date if provided
                $q->whereDate('casts.joined_at', $selectedDate);
            }, function ($q) {
                // Otherwise, show casts joined within the last month
                $q->where('casts.joined_at', '>=', Carbon::now()->subMonth(1));
            })
            ->orderBy('casts.joined_at', 'desc')
            ->select([
                'casts.id as id',
                'casts.name as name',
                'casts.age as age',
                'casts.height as height',
                'casts.bra_size as bra_size',
                'casts.bust as bust',
                'casts.waist as waist',
                'casts.hip as hip',
                'casts.gallery_1 as gallery_1',
                'casts.gallery_2 as gallery_2',
                'casts.gallery_3 as gallery_3',
                'casts.gallery_4 as gallery_4',
                'casts.gallery_5 as gallery_5',
                'casts.gallery_6 as gallery_6',
                'casts.joined_at as joined_at',
                'casts.appeal_point as appeal_point',
                'shops.slug as shop_slug',
                'shops.name as shop_name',
            ]);

        $casts = $castQuery
            ->limit(30)
            ->get();

        // Generate date search dates (next 6 days)
        $dateSearchDates = [];
        for ($i = 0; $i < 6; $i++) {
            $date = Carbon::now()->addDays($i);
            $dateSearchDates[] = [
                'date' => $date->format('Y-m-d'),
                'display' => $date->format('m/d'),
                'label' => $date->format('m/d')
            ];
        }

        // Button group (2 rows of 3) - used by the shared sub page layout.
        $buttonGroup = [
            [
                ['shop' => 'shizuku', 'image' => 'assets/img/groups/photo-diary-button1.png', 'alt' => 'Shizuku', 'class' => 'all-shops-button--shizuku'],
                ['shop' => 'siroganeze', 'image' => 'assets/img/groups/photo-diary-button2.png', 'alt' => 'Siroganeze'],
                ['shop' => 'lovestory', 'image' => 'assets/img/groups/photo-diary-button3.png', 'alt' => 'Love Story'],
            ],
            [
                ['shop' => 'pussycat', 'image' => 'assets/img/groups/photo-diary-button4.png', 'alt' => 'Pussycat', 'class' => 'all-shops-button--pussycat'],
                ['shop' => 'miyabi', 'image' => 'assets/img/groups/photo-diary-button5.png', 'alt' => 'Miyabi', 'class' => 'all-shops-button--miyabi'],
                ['shop' => 'en', 'image' => 'assets/img/groups/photo-diary-button6.png', 'alt' => 'En'],
            ],
        ];

        return view('public.groups.newface', [
            'casts' => $casts,
            'shops' => $shops,
            'selectedShop' => $selectedShop,
            'buttonGroup' => $buttonGroup,
            'dateSearchDates' => $dateSearchDates,
            'selectedDate' => $selectedDate,
        ]);
    }

    public function showPickup(Request $request): View
    {

        Carbon::setLocale('ja');

        // Get selected date from request
        $selectedDate = $request->query('date', '');

        $shops = Shop::whereNot('slug', 'touchvip')
            ->whereNot('slug', 'headquarter')
            ->orderBy('rank', 'asc')
            ->get(['id', 'name', 'slug']);

        $allowedSlugs = $shops->pluck('slug')->all();
        $selectedShop = (string) $request->query('shop', '');
        if ($selectedShop !== '' && !in_array($selectedShop, $allowedSlugs, true)) {
            $selectedShop = '';
        }

        $castQuery = Pickup::leftJoin('casts','pickups.cast_id','=','casts.id')
            ->leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
            ->where('casts.is_public', 1)
            ->whereNot('casts.shop_id', Shop::where('slug', 'touchvip')->first()->id)
            ->whereNot('casts.shop_id', Shop::where('slug', 'headquarter')->first()->id)
            ->when($selectedShop !== '', function ($q) use ($selectedShop) {
                $q->where('shops.slug', $selectedShop);
            })
            // ->when($selectedDate !== '', function ($q) use ($selectedDate) {
            //     // Filter by specific date if provided
            //     $q->whereDate('casts.joined_at', $selectedDate);
            // }, function ($q) {
            //     // Otherwise, show casts joined within the last month
            //     $q->where('casts.joined_at', '>=', Carbon::now()->subMonth(1));
            // })
            ->orderBy('casts.joined_at', 'desc')
            ->select([
                'casts.id as id',
                'casts.name as name',
                'casts.age as age',
                'casts.height as height',
                'casts.bra_size as bra_size',
                'casts.bust as bust',
                'casts.waist as waist',
                'casts.hip as hip',
                'casts.gallery_1 as gallery_1',
                'casts.joined_at as joined_at',
                'casts.appeal_point as appeal_point',
                'shops.slug as shop_slug',
                'shops.name as shop_name',
            ]);

        $casts = $castQuery
            ->limit(30)
            ->get();

        // Generate date search dates (next 6 days)
        $dateSearchDates = [];
        for ($i = 0; $i < 6; $i++) {
            $date = Carbon::now()->addDays($i);
            $dateSearchDates[] = [
                'date' => $date->format('Y-m-d'),
                'display' => $date->format('m/d'),
                'label' => $date->format('m/d')
            ];
        }

        // Button group (2 rows of 3) - used by the shared sub page layout.
        $buttonGroup = [
            [
                ['shop' => 'shizuku', 'image' => 'assets/img/groups/photo-diary-button1.png', 'alt' => 'Shizuku', 'class' => 'all-shops-button--shizuku'],
                ['shop' => 'siroganeze', 'image' => 'assets/img/groups/photo-diary-button2.png', 'alt' => 'Siroganeze'],
                ['shop' => 'lovestory', 'image' => 'assets/img/groups/photo-diary-button3.png', 'alt' => 'Love Story'],
            ],
            [
                ['shop' => 'pussycat', 'image' => 'assets/img/groups/photo-diary-button4.png', 'alt' => 'Pussycat', 'class' => 'all-shops-button--pussycat'],
                ['shop' => 'miyabi', 'image' => 'assets/img/groups/photo-diary-button5.png', 'alt' => 'Miyabi', 'class' => 'all-shops-button--miyabi'],
                ['shop' => 'en', 'image' => 'assets/img/groups/photo-diary-button6.png', 'alt' => 'En'],
            ],
        ];




        // $pickups = Pickup::with('cast')->whereHas('cast', function ($query) {
        //     $query->where('is_public', true);
        // })->get();

        return view('public.groups.pickup', [
            'casts' => $casts,
            'shops' => $shops,
            'selectedShop' => $selectedShop,
            'buttonGroup' => $buttonGroup,
            'dateSearchDates' => $dateSearchDates,
            'selectedDate' => $selectedDate,
        ]);
    }
    /**
     * Display the movie page.
     */
    public function showMovie(Request $request): View
    {
        // Get shops for validation
        $shops = Shop::whereNot('slug', 'touchvip')
            ->whereNot('slug', 'headquarter')
            ->orderBy('rank', 'asc')
            ->get(['id', 'name', 'slug']);

        $allowedSlugs = $shops->pluck('slug')->all();
        $selectedShop = (string) $request->query('shop', '');
        if ($selectedShop !== '' && !in_array($selectedShop, $allowedSlugs, true)) {
            $selectedShop = '';
        }

        // Build video query
        $videoQuery = Video::leftJoin('casts', 'videos.cast_id', '=', 'casts.id')
            ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
            ->where('videos.is_public', 1)
            ->where('casts.is_public', 1)
            ->whereNot('shops.slug', 'touchvip')
            ->whereNot('shops.slug', 'headquarter');

        // Filter by shop if selected
        if ($selectedShop !== '') {
            $shop = Shop::where('slug', $selectedShop)->first();
            if ($shop) {
                $videoQuery->where('casts.shop_id', $shop->id);
            }
        }

        $videos = $videoQuery
            ->select([
                'videos.id as video_id',
                'videos.video_url',
                'videos.thumb_url',
                'videos.updated_at as video_updated_at',
                'casts.id as cast_id',
                'casts.name as cast_name',
                'casts.age',
                'casts.height',
                'casts.bust',
                'casts.bra_size',
                'casts.waist',
                'casts.hip',
                'casts.gallery_1',
                'shops.slug as shop_slug',
                'shops.name as shop_name',
            ])
            ->orderBy('videos.updated_at', 'desc')
            ->get();

        // Button group (2 rows of 3) - used by the shared sub page layout.
        $buttonGroup = [
            [
                ['shop' => 'shizuku', 'image' => 'assets/img/groups/photo-diary-button1.png', 'alt' => 'Shizuku', 'class' => 'all-shops-button--shizuku'],
                ['shop' => 'siroganeze', 'image' => 'assets/img/groups/photo-diary-button2.png', 'alt' => 'Siroganeze'],
                ['shop' => 'lovestory', 'image' => 'assets/img/groups/photo-diary-button3.png', 'alt' => 'Love Story'],
            ],
            [
                ['shop' => 'pussycat', 'image' => 'assets/img/groups/photo-diary-button4.png', 'alt' => 'Pussycat', 'class' => 'all-shops-button--pussycat'],
                ['shop' => 'miyabi', 'image' => 'assets/img/groups/photo-diary-button5.png', 'alt' => 'Miyabi', 'class' => 'all-shops-button--miyabi'],
                ['shop' => 'en', 'image' => 'assets/img/groups/photo-diary-button6.png', 'alt' => 'En'],
            ],
        ];

        // Get shop name for heading
        $shopNameForHeading = $selectedShop !== ''
            ? ($shops->firstWhere('slug', $selectedShop)->name ?? '全店舗')
            : '全店舗';

        return view('public.groups.movie', [
            'videos' => $videos,
            'shops' => $shops,
            'selectedShop' => $selectedShop,
            'buttonGroup' => $buttonGroup,
            'shopNameForHeading' => $shopNameForHeading,
        ]);
    }

    /**
     * Display the girl search page.
     */
    public function showGirlSearch(Request $request): View
    {
        $personalities = Personality::where('is_public', true)->get();
        $styles = Style::where('is_public', true)->get();
        $options = Option::where('is_public', true)->get();

        $searchResults = null;
        $searchCriteria = [
            'name' => null,
            'height' => null,
            'age' => null,
            'bust' => null,
            'personality' => null,
            'style' => null,
            'option' => null,
        ];
        $attendanceData = [];

        // Handle search if POST request
        if ($request->isMethod('post')) {
            $names = $request->input('name');
            $name_match = $request->input('name_match');
            $personality = $request->input('personality');
            $style = $request->input('style');
            $option = $request->input('option');
            $age = $request->input('age');
            $height = $request->input('height');
            $bust = $request->input('bust');
            $status = $request->input('status');
            $date = Carbon::now()->format('Y-m-d');

            // Build search query (reuse logic from searchResult)
            $query = Cast::query();
            $query->leftjoin('cast_option', 'casts.id', '=', 'cast_option.cast_id');
            $query->leftjoin('cast_personality', 'casts.id', '=', 'cast_personality.cast_id');
            $query->leftjoin('cast_style', 'casts.id', '=', 'cast_style.cast_id');
            $query->leftjoin('shops', 'casts.shop_id', '=', 'shops.id');

            if ($status == 'working') {
                $query->leftjoin('attendances', 'casts.id', '=', 'attendances.cast_id')
                    ->where('attendances.is_public', 1)
                    ->whereDate('attendances.start_datetime', '<=', $date)
                    ->whereDate('attendances.end_datetime', '>=', $date);
            }

            $query->where('casts.is_public', 1);

            // Name search
            if ($names) {
                $namess = mb_convert_kana($names, 's');
                $nameArray = explode(' ', $namess);
                $nameArray = array_filter($nameArray, 'strlen');
                if ($name_match == 'partial') {
                    $query->where(function($q) use ($nameArray) {
                        foreach ($nameArray as $name) {
                            $q->orWhere('casts.name', 'like', "%$name%");
                        }
                    });
                } else if ($name_match == 'full') {
                    $query->where(function($q) use ($nameArray) {
                        foreach ($nameArray as $name) {
                            $q->where('casts.name', 'like', "%$name%");
                        }
                    });
                }
            }

            // Height filter
            if ($height) {
                switch ($height) {
                    case '150': $query->where('casts.height', '<=', 150); break;
                    case '155': $query->where('casts.height', '<=', 155)->where('casts.height', '>', 150); break;
                    case '160': $query->where('casts.height', '<=', 160)->where('casts.height', '>', 155); break;
                    case '165': $query->where('casts.height', '<=', 165)->where('casts.height', '>', 160); break;
                    case '170': $query->where('casts.height', '>=', 170); break;
                }
            }

            // Age filter
            if ($age) {
                if ($age == '30') {
                    $query->where('casts.age', '>=', 30);
                } else {
                    $query->where('casts.age', '=', $age);
                }
            }

            // Bust filter
            if ($bust) {
                $query->where('casts.bra_size', '=', $bust);
            }

            // Personality filter
            if ($personality && $personality != -1) {
                $query->where('cast_personality.personality_id', $personality);
            }

            // Style filter
            if ($style && $style != -1) {
                $query->where('cast_style.style_id', $style);
            }

            // Option filter
            if ($option && $option != -1) {
                $query->where('cast_option.option_id', $option);
            }

            // Exclude touchvip and headquarter
            $shops = Shop::where('slug', 'touchvip')->orWhere('slug', 'headquarter')->orderBy('rank', 'asc')->get();
            foreach ($shops as $shop) {
                $query->whereNot('casts.shop_id', $shop->id);
            }

            $query->groupBy('casts.id');

            if ($status == 'working') {
                $query->select(
                    'casts.*',
                    'shops.name as shop_name',
                    'shops.slug as shop_slug',
                    DB::raw("DATE_FORMAT(attendances.start_datetime, '%H:%i') as start_datetime"),
                    DB::raw("DATE_FORMAT(attendances.end_datetime, '%H:%i') as end_datetime")
                );
            } else {
                $query->select('casts.*', 'shops.name as shop_name', 'shops.slug as shop_slug');
            }

            $searchResults = $query->get();

            // Get attendance data for all results (check today's attendance)
            if ($searchResults->isNotEmpty()) {
                $castIds = $searchResults->pluck('id')->toArray();
                $today = Carbon::now()->format('Y-m-d');

                // Always fetch attendance data separately to ensure we have it
                // Check if today falls within the attendance period (start <= today <= end)
                $attendances = Attendance::whereIn('cast_id', $castIds)
                    ->where('is_public', 1)
                    ->whereDate('start_datetime', '<=', $today)
                    ->whereDate('end_datetime', '>=', $today)
                    ->get()
                    ->keyBy('cast_id');

                foreach ($searchResults as $cast) {
                    $foundAttendance = false;

                    // If status is 'working', check if query already has formatted time data
                    if ($status == 'working' && isset($cast->start_datetime) && isset($cast->end_datetime)) {
                        // start_datetime and end_datetime are already formatted as 'H:i' from DATE_FORMAT
                        $startTime = trim((string)$cast->start_datetime);
                        $endTime = trim((string)$cast->end_datetime);
                        if (!empty($startTime) && !empty($endTime) && $startTime !== '00:00' && $endTime !== '00:00') {
                            $attendanceData[$cast->id] = [
                                'start' => $startTime,
                                'end' => $endTime,
                            ];
                            $foundAttendance = true;
                        }
                    }

                    // Also check attendance table (in case query data wasn't available or status is not 'working')
                    if (!$foundAttendance && isset($attendances[$cast->id])) {
                        $attendance = $attendances[$cast->id];
                        if ($attendance->start_datetime && $attendance->end_datetime) {
                            $startTime = date('H:i', strtotime($attendance->start_datetime));
                            $endTime = date('H:i', strtotime($attendance->end_datetime));
                            if ($startTime && $endTime && $startTime !== '00:00' && $endTime !== '00:00') {
                                $attendanceData[$cast->id] = [
                                    'start' => $startTime,
                                    'end' => $endTime,
                                ];
                            }
                        }
                    }
                }
            }

            // Build search criteria for display
            $searchCriteria = [
                'name' => $names ?: null,
                'height' => $height ?: null,
                'age' => $age ?: null,
                'bust' => $bust ?: null,
                'personality' => ($personality && $personality != -1) ? Personality::find($personality) : null,
                'style' => ($style && $style != -1) ? Style::find($style) : null,
                'option' => ($option && $option != -1) ? Option::find($option) : null,
            ];
        }

        return view('public.groups.girl-search', [
            'personalities' => $personalities,
            'styles' => $styles,
            'options' => $options,
            'searchResults' => $searchResults,
            'searchCriteria' => $searchCriteria,
            'attendanceData' => $attendanceData,
        ]);
    }
}
