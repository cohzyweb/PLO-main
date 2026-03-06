<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Ranking;
use App\Models\Diary;
use App\Models\Qa;
use App\Models\Event;
use App\Models\Banner;
use App\Models\Attendance;
use App\Models\Reservation;
use App\Models\Video;
use App\Models\Review;
use App\Models\History;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use App\Models\CourseGroup;
use App\Models\Appoint;
use App\Models\Extend;
use App\Models\OptionRS;

class ShopController extends Controller
{
    /**
     * Display the shop home page.
     */
    public function showHome(Request $request, string $shop): View
    {
        $events = Event::where('published_status', 1)
            ->orWhere(function($query) {
                $query->where('published_status', 2)
                    ->where('published_at', '<=', Carbon::now());
            })
            ->orWhere('published_status',4)
            ->where('shop_id', Shop::where('slug', $shop)->first()->id)
            ->orderBy('published_at', 'desc')
            ->get();
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        Log::info("todayCasts");

        $todayCasts = Cast::leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
            ->leftJoin('attendances', 'attendances.cast_id', '=', 'casts.id')
            ->where('casts.is_public', 1)
            ->where('shops.slug', 'like', $shop)
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
                'casts.created_at as created_at',
                'attendances.start_datetime as start_datetime',
                'attendances.end_datetime as end_datetime',
                'shops.slug as shop_slug',
                'shops.name as shop_name',
                ]) // 必要に応じて明示的に
            ->get();
        Log::info($todayCasts);
        $shop_id = Shop::where('slug', $shop)->first()->id;
        // dd($shop_id);
        $diaries = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
            ->where('diaries.is_public', 1)
            ->where('casts.is_public', 1)
            ->where('casts.shop_id', $shop_id)
            ->select([
                'diaries.id',
                'diaries.subject',
                'diaries.created_at',
                'casts.name',
                'casts.shop_id',
                'diaries.photo',
            ])
            ->orderBy('diaries.created_at', 'desc') // ここを明示
            ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 6 : 4)
            ->get();
        $new_girls = Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('created_at', '>=', Carbon::now()->subWeek(2))
        ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 4 : 4)
        ->get();
        if ($new_girls) {
            $new_girls = $new_girls->map(function ($new_girl) {
                $sql = "SELECT group_concat(personalities.name) AS personality FROM `".env('DB_DATABASE')."`.cast_personality
LEFT JOIN `".env('DB_DATABASE')."`.personalities
ON cast_personality.personality_id = personalities.id
WHERE cast_personality.cast_id = $new_girl->id;
";
                // dd($sql);
                $results = DB::select($sql);
                // dd($results[0]->personality);
                $new_girl->pointpersonality = $results[0]->personality;
                $sql = "SELECT GROUP_CONCAT(styles.name) AS style FROM `".env('DB_DATABASE')."`.cast_style
LEFT JOIN `".env('DB_DATABASE')."`.styles
ON cast_style.style_id = styles.id
WHERE cast_style.cast_id = $new_girl->id;";
                $results = DB::select($sql);
                // dd($results[0]->style);
                $new_girl->style = $results[0]->style;
                // $new_girl->appeal_pointpersonality = $new_girl->appeal_point ?? '';
                return $new_girl;
            });
        }
        // dd($new_girls);
        $new_girls_month = Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('created_at', '>=', Carbon::now()->subMonth(1))
        ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 4 : 3)
        ->get();

        $castlist = Cast::leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
        // ->leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
        ->where('casts.is_public', 1)
        ->where('casts.shop_id', Shop::where('slug', $shop)->first()->id)
        // ->whereRaw('DATE(attendances.start_datetime) = CURDATE()')
        ->inRandomOrder()
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
            'casts.created_at as created_at',
            // 'attendances.start_datetime as start_datetime',
            // 'attendances.end_datetime as end_datetime',
            'shops.slug as shop_slug',
            'shops.name as shop_name',
        ])
        ->get();

        if ($castlist) {
            $castlist = $castlist->map(function ($cast) {
                $cast->start_datetime = Attendance::where('cast_id', $cast->id)->where('is_public', 1)->where('start_datetime', '<=', Carbon::now()->toDateString())->where('end_datetime', '>=', Carbon::now()->toDateString())->first()->start_datetime ?? '';
                $cast->end_datetime = Attendance::where('cast_id', $cast->id)->where('is_public', 1)->where('start_datetime', '<=', Carbon::now()->toDateString())->where('end_datetime', '>=', Carbon::now()->toDateString())->first()->end_datetime ?? '';
                return $cast;
            });
        }

        $news = News::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('published_status', 1)
        ->orWhere(function($query) {
            $query->where('published_status', 2)
                  ->where('published_at', '<=', now());
        })
        ->inRandomOrder()
        ->limit(4)
        ->orderBy('published_at', 'desc')
        ->get();
        // dd($castlist);
        // dd($diaries);
        return view('public.shop.home', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            // 'todayCasts' => Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->get(),
            'todayCasts' => $todayCasts,
            'events' => $events,
            'banners' => $banners,
            'diaries' => $diaries,
            'new_girls' => $new_girls,
            'new_girls_month' => $new_girls_month,
            'castlist' => $castlist,
            'news' => $news,
        ]);
    }

    public function showCastProfile(Request $request, string $shop, string $id): View
    {
        $cast = Cast::where('id', $id)->where('is_public', 1)->with('styles')->with('personalities')->with('options')->firstOrFail();
        $gallerys = [];
        $gallery_index = 0;
        // dd($cast);
        for ($i = 0; $i < 10; $i++) {
            if ($cast['gallery_'. ($i + 1)] !== null && $cast['gallery_'. ($i + 1)] !== '') {
                if (Storage::disk('public')->exists($cast['gallery_'. ($i + 1)])) {
                    $gallerys[$gallery_index] = $cast['gallery_'. ($i + 1)];
                    $gallery_index++;
                }

            }
        }
        // $diarys = Diary::where('cast_id', $cast->id)->where('is_public', 1)->orderBy('created_at', 'desc')->get();
        $diarys = Diary::where('cast_id', $id)->where('is_public', 1)->orderBy('created_at', 'desc')->limit(4)->get();
        $qas = Qa::where('cast_id', $cast->id)->where('question_id', '!=', null)->with('question')->orderBy('rank', 'asc')->get();
        $personalities = [];
        $styles = [];
        $options = [];
        foreach ($cast->personalities as $personality) {
            $personalities[] = $personality->name;
        }
        $personalities = implode(', ', $personalities);
        foreach ($cast->styles as $style) {
            $styles[] = $style->name;
        }
        $styles = implode(', ', $styles);
        foreach ($cast->options as $option) {
            $options[] = $option->name;
        }
        $options = implode(', ', $options);
        $attendances = Attendance::where('attendances.cast_id', $cast->id)
        ->where('attendances.is_public', 1)
        ->whereDate('attendances.start_datetime', '>=', Carbon::now()->toDateString())
        ->WhereDate('attendances.end_datetime', '<=', Carbon::now()->addWeek(1)->toDateString())
        ->selectRaw("DATE_FORMAT(attendances.start_datetime, '%Y-%m-%d') as start_date,
            DATE_FORMAT(attendances.end_datetime, '%Y-%m-%d') as end_date,
            DATE_FORMAT(attendances.start_datetime, '%H:%i') as start_time,
            DATE_FORMAT(attendances.end_datetime, '%H:%i') as end_time")
        ->get();
        $attendance_today = Attendance::where('attendances.cast_id', $cast->id)
        ->where('attendances.is_public', 1)
        ->whereDate('attendances.start_datetime', '<=', Carbon::now()->toDateString())
        ->whereDate('attendances.end_datetime', '>=', Carbon::now()->toDateString())
        // ->where('attendances.start_datetime', '<=', Carbon::now()->toDateString())
        // ->where('attendances.end_datetime', '>=', Carbon::now()->toDateString())
        ->selectRaw("DATE_FORMAT(attendances.start_datetime, '%Y-%m-%d') as start_date,
            DATE_FORMAT(attendances.end_datetime, '%Y-%m-%d') as end_date,
            DATE_FORMAT(attendances.start_datetime, '%H:%i') as start_time,
            DATE_FORMAT(attendances.end_datetime, '%H:%i') as end_time")
        ->get();
        $reservations = Reservation::leftJoin('attendances', 'reservations.attendance_id', '=', 'attendances.id')
        ->where('attendances.cast_id', $cast->id)
        ->where('reservations.start_time', '<=', Carbon::now()->toDateTimeString())
        ->where('reservations.end_time', '>=', Carbon::now()->toDateTimeString())
        ->select('reservations.*', 'attendances.id as attendance_id')
        ->get();
        // dd($reservations);

        Carbon::setLocale('ja');
        $today = Carbon::now()->format('Y-m-d');
        $days = array();
        $weekDay = Carbon::now()->format('m/d');
        $minDay = Carbon::now()->getTranslatedMinDayName();
        $status = 'お休み';
        foreach ($attendances as $attendance) {
            if ($attendance->start_date == $today) {
                $status = $attendance->start_time . '~' . $attendance->end_time;
            }
        }

        $days[0] = ['date'=>$today,'weekDay'=>$weekDay, 'status'=>$status, 'minDay'=>$minDay];
        for ($i = 1; $i < 7; $i++) {
            $date = Carbon::now()->addDays($i)->format('Y-m-d');
            $weekDay = Carbon::now()->addDays($i)->format('m/d');
            $minDay = Carbon::now()->addDays($i)->getTranslatedMinDayName();
            $status = 'お休み';
            foreach ($attendances as $attendance) {
                if ($attendance->start_date == $date) {
                    // $status =   '出勤中';
                    $status = $attendance->start_time . '~' . $attendance->end_time;
                }
            }
            $days[$i] = ['date'=>$date,'weekDay'=>$weekDay, 'status'=>$status, 'minDay'=>$minDay] ;
        }
        // dd($days);
        // dd($attendances);

        $videos = Video::leftJoin('casts', 'videos.cast_id', '=', 'casts.id')
        ->where('videos.cast_id', $id)
        ->where('videos.is_public', 1)
        ->orderBy('videos.updated_at', 'desc')
        ->limit(2)
        ->select('videos.*','casts.*')
        ->get();
        // dd($videos);
        return view('public.shop.cast.profile', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'cast' => $cast,
            'gallerys' => $gallerys,
            'diarys' => $diarys,
            'qas' => $qas,
            'personalities' => $personalities,
            'styles' => $styles,
            'options' => $options,
            'attendances' => $attendances,
            'attendance_today' => $attendance_today,
            'reservation' => $reservations,
            'days' => $days,
            'videos' => $videos,
        ]);
    }

    public function showRanking(Request $request, string $shop): View
    {
        $shop = Shop::where('slug', $shop)->get()->first();

        $rankings = Ranking::where('rankings.shop_id', $shop->id)
            ->join('casts', 'rankings.cast_id', '=', 'casts.id')
            ->where('casts.shop_id', $shop->id)
            ->where('casts.is_public',1)
            ->select('rankings.*', 'casts.*','rankings.rank as ranking_rank')
            ->orderBy('rankings.rank', 'asc')
            ->get();
        // dd($rankings);
        return view('public.shop.ranking', [
            'shop' => $shop,
            'rankings' => $rankings,
        ]);
    }

    public function showEvent(Request $request, string $shop): View
    {
        // $events = Event::where('published_status', 1)
        //     ->where('shop_id', Shop::where('slug', $shop)->first()->id)
        //     ->orWhere(function($query) {
        //         $query->where('published_status', 2)
        //             ->where('published_at', '<=', Carbon::now());
        //     })
        //     ->orderBy('published_at', 'desc')
        //     ->get();
        $events = Event::where('shop_id', Shop::where('slug', $shop)->first()->id)
            ->where(function($query) {
                $query->where('published_status', 1)
                    ->orWhere('published_status',4)
                    ->orWhere(function($query) {
                        $query->where('published_status', 2)
                            ->where('published_at', '<=', Carbon::now());
                    });
            })
            ->orderBy('published_at', 'desc')
            ->get();
        return view('public.shop.event', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'events' => $events,
        ]);
    }
    public function showMovieList(Request $request, string $shop): View
    {
        $movies = Video::join('casts', 'videos.cast_id', '=', 'casts.id')
        ->where('casts.shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('casts.is_public', 1)
        ->where('videos.is_public', 1)
        ->orderBy('videos.updated_at', 'desc')
        ->select('videos.*', 'casts.*')
        ->get();
        return view('public.shop.movielist', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'movies' => $movies,
        ]);
    }
    public function showEventDetail(Request $request, string $shop, string $id): View
    {
        $event = Event::find($id);
        return view('public.shop.eventDetail', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'event' => $event,
        ]);
    }

    public function showAbout(Request $request, string $shop): View
    {
        return view('public.shop.about', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
        ]);
    }

    public function showFee(Request $request, string $shop): View
    {
        $course_groups = CourseGroup::where('shop_id', Shop::where('slug', $shop)->first()->id)->get();
        $appoints = Appoint::where('shop_id', Shop::where('slug', $shop)->first()->id)->get();
        $extends = Extend::where('shop_id', Shop::where('slug', $shop)->first()->id)->get();
        $option_rs = OptionRS::leftJoin('options', 'options_rs.option_id', '=', 'options.id')
        ->where('options_rs.shop_id', Shop::where('slug', $shop)->first()->id)
        ->select('options_rs.*', 'options.name as option_name')
        ->get();
        // dd($course_groups, $appoints, $extends, $option_rs);
        return view('public.shop.fee', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'course_groups' => $course_groups,
            'appoints' => $appoints,
            'extends' => $extends,
            'option_rs' => $option_rs,
        ]);
    }

    public function showSchedule(Request $request, string $shop): View
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
        return view('public.shop.schedule', [
            'days' => $days,
            'shop' => Shop::where('slug', $shop)->get()->first(),
        ]);
    }

    public function showNewcomer(Request $request, string $shop): View
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
        $cast_query = Cast::where('shop_id', Shop::where('slug', $shop)->first()->id);
        $newcomers = $cast_query
            ->where('created_at', '>=', Carbon::now()->subMonth(1))
            ->where('is_public', 1)
            ->inRandomOrder()
            ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
            ->onEachSide(0)
            ->withPath('newcomer');

        return view('public.shop.newcomer', [
            'newcomers' => $newcomers,
            'shop' => Shop::where('slug', $shop)->get()->first(),
        ]);
    }

    public function showCastlist(Request $request, string $shop): View
    {
        // $castlist = Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)
        // ->inRandomOrder()
        $castlist = Cast::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('is_public', 1)
        ->orderByRaw('casts.rank IS NULL, casts.rank ASC')
        ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
            ->onEachSide(0)
            ->withPath('castlist');

            return view('public.shop.castlist', [
            'castlist' => $castlist,
            'shop' => Shop::where('slug', $shop)->get()->first(),
        ]);
    }
    public function showReviewlist(Request $request, string $shop,string $id = null): View
    {
        $sql = 'SELECT `'.env("DB_DATABASE").'`.reviews.id as review_id,
        `'.env("DB_DATABASE").'`.reviews.title as review_title,
        `'.env("DB_DATABASE").'`.reviews.content as review_content,
        `'.env("DB_DATABASE").'`.reviews.created_at as review_created_at,
        `'.env("DB_DATABASE").'`.reviews.is_public as review_is_public,
        `'.env("DB_DATABASE").'`.reviews.member_id as review_member_id,
        `'.env("DB_DATABASE").'`.reviews.history_id as review_history_id,
        `'.env("DB_DATABASE").'`.reviews.average_point as review_average_point,
        `'.env("DB_DATABASE").'`.reviews.cast_point as review_cast_point,
        `'.env("DB_DATABASE").'`.reviews.play_point as review_play_point,
        `'.env("DB_DATABASE").'`.reviews.price_point as review_price_point,
        `'.env("DB_DATABASE").'`.reviews.stuff_point as review_stuff_point,
        `'.env("DB_DATABASE").'`.reviews.photo_point as review_photo_point,
        `'.env("DB_DATABASE").'`.reviews.manager_comment as review_manager_comment,
        `'.env("DB_DATABASE").'`.members.name as member_name,
        `'.env("DB_DATABASE").'`.casts.id as cast_id,
        `'.env("DB_DATABASE").'`.casts.name as cast_name,
        `'.env("DB_DATABASE").'`.casts.age as cast_age,
        `'.env("DB_DATABASE").'`.casts.height as cast_height,
        `'.env("DB_DATABASE").'`.casts.bra_size as cast_cup,
        `'.env("DB_DATABASE").'`.casts.bust as cast_bust,
        `'.env("DB_DATABASE").'`.casts.waist as cast_waist,
        `'.env("DB_DATABASE").'`.casts.hip as cast_hip,
        `'.env("DB_DATABASE").'`.casts.gallery_1 as cast_gallery,
        `'.env("DB_DATABASE").'`.casts.manager_comment as cast_manager_comment
        FROM `'.env("DB_DATABASE").'`.reviews
        LEFT JOIN `'.env("MEMBER_DB_DATABASE").'`.histories ON `'.env("DB_DATABASE").'`.reviews.history_id = `'.env("MEMBER_DB_DATABASE").'`.histories.id
        LEFT JOIN `'.env("DB_DATABASE").'`.members ON `'.env("DB_DATABASE").'`.reviews.member_id = `'.env("DB_DATABASE").'`.members.id
        LEFT JOIN `'.env("DB_DATABASE").'`.casts ON `'.env("MEMBER_DB_DATABASE").'`.histories.cast_id = `'.env("DB_DATABASE").'`.casts.id
        WHERE `'.env("MEMBER_DB_DATABASE").'`.histories.shop_id = '.Shop::where('slug', $shop)->first()->id.'
        AND `'.env("DB_DATABASE").'`.casts.is_public = 1';

        if ($id) {
            $sql .= ' AND `'.env("DB_DATABASE").'`.casts.id = '.$id;
        }

        $sql .= ' AND `'.env("DB_DATABASE").'`.reviews.is_public = 1 ORDER BY `'.env("DB_DATABASE").'`.reviews.created_at DESC';
        // dd($sql);
        $reviews = DB::select($sql);

        $casts = Cast::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('is_public', 1)
        ->orderBy('rank', 'asc')
        ->get();

        return view('public.shop.reviewlist', [
            // 'castlist' => $castlist,
            'reviews' => $reviews,
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'casts' => $casts,
            'cast_id' => $id,
        ]);
    }

    public function showDiaryDetail_old(Request $request, string $shop, string $id, string $cast_name): View
    {
        // dd($id, $cast_name);
        $diarys = Diary::where('cast_id', $id)->where('is_public', 1)
        // ->whereDate('created_at', '=', Carbon::now())
        ->orderBy('created_at', 'desc')->get();
        $working = Attendance::where('cast_id', $id)->where('is_public', 1)
        ->whereDate('start_datetime', '<=', Carbon::now())
        ->whereDate('end_datetime', '>=', Carbon::now())
        ->count();
        // dd($working);
        $reservation = 0;
        if ($working > 0) {
            $workID = Attendance::where('cast_id', $id)->where('is_public', 1)
            ->whereDate('start_datetime', '<=', Carbon::now())
            ->whereDate('end_datetime', '>=', Carbon::now())
            ->first()->id;
            $reservation = Reservation::where('attendance_id', $workID)
            ->count();
        } else {
            $reservation = 0;
        }
        return view('public.shop.diarydetail', [
            'diarys' => $diarys,
            'cast_name' => $cast_name,
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'working' => $working,
            'reservation' => $reservation,
            'castId' => $id,
            'date' => Carbon::now()->format('Y-m-d'),
        ]);
    }
    public function showDiaryDetail(Request $request, string $shop, string $id, string $date = null): View
    {
        // dd($id, $cast_name);
        $diary = null;
        if ($date) {
            $date = Carbon::parse($date)->format('Y-m-d');
            $cast = Diary::where('id', $id)->first();
            $diary = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
            ->whereDate('diaries.created_at', $date)
            ->where('diaries.is_public', 1)
            ->where('diaries.cast_id', $cast->cast_id)
            ->where('casts.shop_id', Shop::where('slug', $shop)->first()->id)
            ->where('casts.is_public', 1)
            ->select('diaries.*', 'casts.name as cast_name')
            ->first();
        } else {
            $date = Carbon::now()->format('Y-m-d');
            $diary = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
            ->where('diaries.id', $id)
            ->where('diaries.is_public', 1)
            ->where('casts.shop_id', Shop::where('slug', $shop)->first()->id)
            ->where('casts.is_public', 1)
            ->select('diaries.*', 'casts.name as cast_name')
            ->first();
        }
        // $diary = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
        //         ->where('diaries.id', $id)
        //         ->where('diaries.is_public', 1)
        //         ->select('diaries.*', 'casts.name as cast_name')
        //         ->first();
        $prev = Diary::where('cast_id', $diary->cast_id)->where('created_at', '>', $diary->created_at)->orderBy('created_at', 'asc')->first();
        $next = Diary::where('cast_id', $diary->cast_id)->where('created_at', '<', $diary->created_at)->orderBy('created_at', 'desc')->first();
        $diarys = Diary::where('cast_id', $diary->cast_id)->where('is_public', 1)
        ->selectRaw("DATE_FORMAT(created_at, '%Y-%m-%d') as date, id")
        ->get();
        // ->whereDate('created_at', '=', Carbon::now())
        $working = Attendance::where('cast_id', $id)->where('is_public', 1)
        ->whereDate('start_datetime', '<=', Carbon::now())
        ->whereDate('end_datetime', '>=', Carbon::now())
        ->count();

        // dd($working);
        return view('public.shop.diarydetail', [
            'diary' => $diary,
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'working' => $working,
            'date' => Carbon::now()->format('Y-m-d'),
            'prev' => $prev,
            'next' => $next,
            'diarys' => $diarys,
        ]);
    }

    public function showDiaryList(Request $request, string $shop): View
    {
        $query = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
        ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
        ->where('diaries.is_public', 1)
        ->where('casts.shop_id', Shop::where('slug', $shop)->first()->id)
        ->select('diaries.*', 'casts.name as cast_name', 'casts.id as cast_id', 'shops.name as shop_name', 'shops.slug as shop_slug');

        $query_date = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
        ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
        ->where('diaries.is_public', 1)
        ->where('casts.shop_id', Shop::where('slug', $shop)->first()->id)
        ->selectRaw("DATE_FORMAT(diaries.created_at, '%Y-%m-%d') as date, diaries.id");

        if ($request->has('cast_id')) {
            $cast_id = $request->cast_id;
            if ($cast_id != '') {
                $query->where('diaries.cast_id', $cast_id);
                $query_date->where('diaries.cast_id', $cast_id);
            }
        }
        if ($request->has('date')) {
            $date = $request->date;
            if ($date != '') {
                $query->whereDate('diaries.created_at', $date);
            }
        }
        $diarys = $query->orderBy('diaries.created_at', 'desc')
        ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
        ->onEachSide(0)
        ->appends([
            'cast_id' => $request->cast_id ?? '',
            'date' => $request->date ?? '',
        ])
        ->withPath('diarylist');

        $diarys_date = $query_date->groupBy('date')
        ->get();

        return view('public.shop.diarylist', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'diarys' => $diarys,
            'diarys_date' => $diarys_date,
            'cast_id' => $request->cast_id ?? '',
            'date' => $request->date ?? '',
        ]);
    }

    public function showNewsList(Request $request, string $shop): View
    {
        $news = News::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('published_status', 1)
        ->orWhere(function($query) {
            $query->where('published_status', 2)
                  ->where('published_at', '<=', now());
        })
        ->orderBy('published_at', 'desc')
        ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
        ->onEachSide(0)
        ->withPath('newslist');

        return view('public.shop.newslist', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'news' => $news,
        ]);
    }

    public function showNewsDetail(Request $request, string $shop, string $id): View
    {
        $news = News::find($id);
        // dd($news,$id);
        return view('public.shop.newsdetail', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'news' => $news,
        ]);
    }
}
