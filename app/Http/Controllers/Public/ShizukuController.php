<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Cast;
use App\Models\Shop;
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
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\CourseGroup;
use App\Models\Appoint;
use App\Models\Extend;
use App\Models\OptionRS;
use App\Models\Pickup;
use App\Models\Rank;
use App\Models\System;

class ShizukuController extends Controller
{
    public function showHome(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        // dd($shop);
        // $events = Event::where('published_status', 1)
        //     ->orWhere(function ($query) {
        //         $query->where('published_status', 2)
        //             ->where('published_at', '<=', Carbon::now());
        //     })
        //     ->orWhere('published_status', 4)
        //     ->where('shop_id', Shop::where('slug', $shop)->first()->id)
        //     ->orderBy('published_at', 'desc')
        //     ->get();
        $shopModel = Shop::where('slug', $shop)->firstOrFail();

        $events = Event::where('shop_id', $shopModel->id)
            ->where(function ($query) {
                $query->where('published_status', 1)
                    ->orWhere(function ($query) {
                        $query->where('published_status', 2)
                            ->where('published_at', '<=', now());
                    })
                    ->orWhere('published_status', 4);
            })
            ->orderBy('published_at', 'desc')
            ->get();
        // dd($events);
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
            ->limit(20)
            ->get();

            if ($todayCasts) {
                // $todayCasts->getCollection()->transform(function ($cast) {
                $todayCasts->transform(function ($cast) {
                        $cast->reservation = Reservation::leftjoin('attendances','attendance_id','=','attendances.id')
                    ->where('attendances.cast_id',$cast->id)
                    // ->whereRaw('DATE(attendances.start_datetime) = CURDATE()')
                    // ->whereRaw('DATE(reservations.start_datetime) = CURDATE()')
                    // ->whereRaw('DATE(reservations.end_datetime) = CURDATE()')
                    // ->whereRaw('TIME(reservations.start_time) <= CURTIME()')
                    // ->whereRaw('TIME(reservations.end_time) >= CURTIME()')->first()->end_time ?? '';
                    ->whereRaw('reservations.start_time <= NOW()')
                    ->whereRaw('reservations.end_time >= NOW()')->first()->end_time ?? '';
                    return $cast;
                });
            }

        Log::info($todayCasts);
        $shop_id = Shop::where('slug', $shop)->first()->id;
        $pickups = Pickup::leftJoin('casts', 'casts.id', '=', 'pickups.cast_id')
            ->where('casts.is_public', 1)
            ->where('casts.shop_id', $shop_id)
            ->select([
                'casts.id as id',
                'casts.name as name',
                'casts.age as age',
                'casts.gallery_1 as gallery_1',
            ])
            ->limit(2)
            ->get();
        // dd($shop_id);
        $diaries = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
            ->where('diaries.is_public', 1)
            ->where('casts.is_public', 1)
            ->where('casts.shop_id', $shop_id)
            ->select([
                'diaries.id',
                'diaries.subject',
                'diaries.created_at',
                'casts.name as cast_name',
                'casts.shop_id',
                'diaries.photo',
            ])
            ->orderBy('diaries.created_at', 'desc') // ここを明示
            ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 6 : 4)
            ->get();
        $new_girls = Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)
            ->where('joined_at', '>=', Carbon::now()->subWeek(2))
            ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 4 : 4)
            ->get();
        // dd($new_girls);
        if ($new_girls) {
            $new_girls = $new_girls->map(function ($new_girl) {
                $sql = "SELECT group_concat(personalities.name) AS personality FROM `" . env('DB_DATABASE') . "`.cast_personality
    LEFT JOIN `" . env('DB_DATABASE') . "`.personalities
    ON cast_personality.personality_id = personalities.id
    WHERE cast_personality.cast_id = $new_girl->id;
    ";
                // dd($sql);
                $results = DB::select($sql);
                // dd($results[0]->personality);
                $new_girl->pointpersonality = $results[0]->personality;
                $sql = "SELECT GROUP_CONCAT(styles.name) AS style FROM `" . env('DB_DATABASE') . "`.cast_style
    LEFT JOIN `" . env('DB_DATABASE') . "`.styles
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
            // ->leftJoin('attendances', 'attendances.cast_id', '=', 'casts.id')
            // ->leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
            ->where('casts.is_public', 1)
            ->where('casts.shop_id', Shop::where('slug', $shop)->first()->id)
            // ->whereRaw('DATE(attendances.start_datetime) = CURDATE()')
            // ->inRandomOrder()
            ->orderBy('id','asc')
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
            ->limit(20)
            ->get();

        if ($castlist) {
            $castlist = $castlist->map(function ($cast) {
                $cast->start_datetime = Attendance::where('cast_id', $cast->id)->where('is_public', 1)->whereRaw('start_datetime <= NOW()')->whereRaw('end_datetime >= NOW()')->first()->start_datetime ?? '';
                $cast->end_datetime = Attendance::where('cast_id', $cast->id)->where('is_public', 1)->whereRaw('start_datetime <= NOW()')->whereRaw('end_datetime >= NOW()')->first()->end_datetime ?? '';
                return $cast;
            });
        }
        // $temp = Attendance::where('cast_id', 258)->where('is_public', 1)->where('start_datetime', '<=' ,'NOW()')->where('end_datetime', '>=' ,'NOW()')->first()->start_datetime;
        // $temp = Attendance::where('cast_id', 258)->where('is_public', 1)->whereRaw('start_datetime <= NOW()')->whereRaw('end_datetime >= NOW()')->first()->start_datetime;
        // dd($temp);
        $news = News::where('shop_id', Shop::where('slug', $shop)->first()->id)
            ->where(function ($query) {
                $query->where('published_status', 1)
                    ->orWhere(function ($q) {
                        $q->where('published_status', 2)
                            ->where('published_at', '<=', now());
                    });
            })
            ->inRandomOrder()
            // ->limit(4)
            ->orderBy('published_at', 'desc')
            ->get();
        // dd($news);
        $rank_id = Rank::where('is_public', 1)->orderBy('id', 'asc')->first()->id;
        $rankings = Ranking::leftJoin('casts', 'casts.id', '=', 'rankings.cast_id')
            ->where('rankings.shop_id', $shop_id)
            ->where('rankings.rank_id', $rank_id)
            ->select([
                'casts.gallery_1 as cast_gallery_1',
            ])
            ->orderBy('rankings.rank', 'asc')
            ->limit(2)
            ->get();
        // dd($rankings);
        // dd($banners);
        // dd($events);
        return view('public.shop.' . $shop . '.home', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'todayCasts' => $todayCasts,
            'events' => $events,
            'banners' => $banners,
            'diaries' => $diaries,
            'new_girls' => $new_girls,
            'new_girls_month' => $new_girls_month,
            'castlist' => $castlist,
            'news' => $news,
            'pickups' => $pickups,
            'rankings' => $rankings,
        ]);
    }

    public function showSystem(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();

        $system = System::where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->first();
        $courses = CourseGroup::where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at','desc')->get();
        $appoints = Appoint::where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at','desc')->get();
        $extends = Extend::where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at','desc')->get();

        return view('public.shop.' . $shop . '.system', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'system' => $system,
            'banners' => $banners,
            'courses' => $courses,
            'appoints' => $appoints,
            'extends' => $extends
        ]);
    }

    public function showProfile(Request $request,string $shop,int $id): View
    {
        $shop = $request->route('shop', 'shizuku');
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();

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

        // $diarys = Diary::where('cast_id', $id)->where('is_public', 1)->orderBy('created_at', 'desc')->limit(4)->get();
        $diarys = Diary::where('cast_id', $id)->where('is_public', 1)->orderBy('created_at', 'desc')->get();
        $qas = Qa::where('cast_id', $cast->id)->where('question_id', '!=', null)->with('question')->orderBy('rank', 'asc')->get();
        $personalities = [];
        $styles = [];
        $individualities = [];
        $playstyles = [];
        foreach ($cast->personalities as $personality) {
            $personalities[] = $personality->name;
        }
        // $personalities = implode(', ', $personalities);
        foreach ($cast->styles as $style) {
            $styles[] = $style->name;
        }
        // $styles = implode(', ', $styles);
        // foreach ($cast->options as $option) {
        //     $options[] = $option->name;
        // }
        foreach ($cast->individualities as $individuality) {
            $individualities[] = $individuality->name;
        }
        foreach ($cast->playstyles as $playstyle) {
            $playstyles[] = $playstyle->name;
        }

        $attendances = Attendance::where('attendances.cast_id', $cast->id)
        ->where('attendances.is_public', 1)
        ->whereDate('attendances.start_datetime', '>=', Carbon::now()->toDateString())
        ->WhereDate('attendances.end_datetime', '<=', Carbon::now()->addWeek(1)->toDateString())
        ->selectRaw("DATE_FORMAT(attendances.start_datetime, '%m/%d') as start_date,
            DATE_FORMAT(attendances.end_datetime, '%m/%d') as end_date,
            DATE_FORMAT(attendances.start_datetime, '%w') as week_day,
            DATE_FORMAT(attendances.start_datetime, '%H:%i') as start_time,
            DATE_FORMAT(attendances.end_datetime, '%H:%i') as end_time")
        ->get();
        // dd($attendances);
        Carbon::setLocale('ja');
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->addDays($i)->format('Y-m-d');
            $weekDay = Carbon::now()->addDays($i)->format('m/d');
            // $minDay = Carbon::now()->addDays($i)->getTranslatedMinDayName();
            $minDay = Carbon::now()->addDays($i)->dayOfWeek;
            $status = 'お休み';
            foreach ($attendances as $attendance) {
                // dd($attendance->start_date, $weekDay);
                if ($attendance->start_date == $weekDay) {
                    // $status =   '出勤中';
                    $status = $attendance->start_time . '~' . $attendance->end_time;
                }
            }
            $days[$i] = ['date'=>$date,'weekDay'=>$weekDay, 'status'=>$status, 'minDay'=>$minDay] ;
        }

        $videos = Video::leftJoin('casts', 'videos.cast_id', '=', 'casts.id')
        ->where('videos.cast_id', $id)
        ->where('videos.is_public', 1)
        ->orderBy('videos.updated_at', 'desc')
        ->limit(2)
        ->select('videos.*','casts.*')
        ->get();


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

        $sql .= ' AND `'.env("DB_DATABASE").'`.casts.id = '.$id;

        $sql .= ' AND `'.env("DB_DATABASE").'`.reviews.is_public = 1 ORDER BY `'.env("DB_DATABASE").'`.reviews.created_at DESC LIMIT 2';
        // dd($sql);
        $reviews = DB::select($sql);
        // dd(Shop::where('slug', $shop)->get()->first());

        $options = DB::table('cast_option')
            ->leftJoin('options', 'cast_option.option_id', '=', 'options.id')
            ->where('cast_option.cast_id', $id)
            ->selectRaw(
                'options.price as option_price , GROUP_CONCAT(options.name) AS option_names'
            )
            ->groupBy('options.price')
            ->get();

        return view('public.shop.' . $shop . '.profile', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'cast' => $cast,
            'gallerys' => $gallerys,
            'diarys' => $diarys,
            'qas' => $qas,
            'personalities' => $personalities,
            'styles' => $styles,
            'individualities' => $individualities,
            'playstyles' => $playstyles,
            'banners' => $banners,
            'attendances' => $attendances,
            'days' => $days,
            'videos' => $videos,
            'reviews' => $reviews,
            'options' => $options,
        ]);
    }

    public function showCastlist(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        $castlist = Cast::leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
        ->leftJoin('attendances', 'attendances.cast_id', '=', 'casts.id')
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
        ->paginate(20)->onEachSide(0)->withPath('castlist');
        // ->limit(20)
        // ->get();

        if ($castlist) {
            $castlist->getCollection()->transform(function ($cast) {
                $cast->start_datetime = Attendance::where('cast_id', $cast->id)->where('is_public', 1)->whereRaw('start_datetime <= NOW()')->whereRaw('end_datetime >= NOW()')->first()->start_datetime ?? '';
                $cast->end_datetime = Attendance::where('cast_id', $cast->id)->where('is_public', 1)->whereRaw('start_datetime <= NOW()')->whereRaw('end_datetime >= NOW()')->first()->end_datetime ?? '';
                return $cast;
            });
        }
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        // dd($banners);
        return view('public.shop.' . $shop . '.castlist', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'castlist' => $castlist,
            'banners' => $banners,
        ]);
    }

    public function showSchedule(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');

        $request_date = $request->get('date');
        $select_day = '';
        if ($request_date) {
            $request_date = Carbon::now()->format('Y').'-'.Carbon::parse($request_date)->format('m-d');
            $select_day = Carbon::parse($request_date)->format('m/d');
        } else {
            $request_date = Carbon::now()->format('Y-m-d');
            $select_day = Carbon::now()->format('m/d');
        }
        Carbon::setLocale('ja');
        $days = array();
        for ($i = 0; $i < 6; $i++) {
            // $date = Carbon::now()->addDays($i)->format('Y-m-d');
            // $weekDay = Carbon::now()->addDays($i)->format('m/d').'('.Carbon::now()->addDays($i)->getTranslatedMinDayName().')';
            $weekDay = Carbon::now()->addDays($i)->format('m/d');
            $days[$i] = $weekDay ;
        }

        $todayCasts = Cast::leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
        ->leftJoin('attendances', 'attendances.cast_id', '=', 'casts.id')
        ->where('casts.is_public', 1)
        ->where('shops.slug', 'like', $shop)
        ->whereRaw('DATE(attendances.start_datetime) = ?', [$request_date])
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
        ->paginate(20)
        ->onEachSide(0)
        ->withPath('schedule');
        // ->get();
        if ($todayCasts) {
            $todayCasts->getCollection()->transform(function ($cast) use ($request_date) {
            // $todayCasts->transform(function ($cast) {
                    $cast->reservation = Reservation::leftjoin('attendances','attendance_id','=','attendances.id')
                ->where('attendances.cast_id',$cast->id)
                // ->whereRaw('DATE(attendances.start_datetime) = CURDATE()')
                ->whereRaw('DATE(reservations.start_time) = ?', [$request_date])
                ->whereRaw('TIME(reservations.start_time) <= CURTIME()')
                ->whereRaw('TIME(reservations.end_time) >= CURTIME()')->first()->end_time ?? '';
                // ->whereRaw('reservations.start_time <= NOW()')
                // ->whereRaw('reservations.end_time >= NOW()')->first()->end_time ?? '';
                return $cast;
            });
        }
        // dd($todayCasts);
        // $reservation = Reservation::leftjoin('attendances','attendance_id','=','attendances.id')
        //                 ->whereRaw('DATE(attendances.start_datetime) = CURDATE()')
        //                 ->whereRaw('TIME(reservations.start_time) <= CURTIME()')
        //                 ->whereRaw('TIME(reservations.end_time) >= CURTIME()')
        //                 ->get()
        // dd($todayCasts);
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        // dd($select_day);
        return view('public.shop.' . $shop . '.schedule', [
            'banners' => $banners,
            'days' => $days,
            'todayCasts' => $todayCasts,
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'select_day' => $select_day,
        ]);
    }

    public function showNewcast(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');

                $new_girls = Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)
            ->where('joined_at', '>=', Carbon::now()->subWeek(2))
            // ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 4 : 4)
            ->paginate(6)
            ->onEachSide(0)
            ->withPath('newcast');
        if ($new_girls) {
            $new_girls->getCollection()->transform(function ($new_girl) {
                $sql = "SELECT group_concat(personalities.name) AS personality FROM `" . env('DB_DATABASE') . "`.cast_personality
    LEFT JOIN `" . env('DB_DATABASE') . "`.personalities
    ON cast_personality.personality_id = personalities.id
    WHERE cast_personality.cast_id = $new_girl->id;
    ";
                // dd($sql);
                $results = DB::select($sql);
                // dd($results[0]->personality);
                $new_girl->pointpersonality = $results[0]->personality;
                $sql = "SELECT GROUP_CONCAT(styles.name) AS style FROM `" . env('DB_DATABASE') . "`.cast_style
    LEFT JOIN `" . env('DB_DATABASE') . "`.styles
    ON cast_style.style_id = styles.id
    WHERE cast_style.cast_id = $new_girl->id;";
                $results = DB::select($sql);
                // dd($results[0]->style);
                $new_girl->style = $results[0]->style;
                // $new_girl->appeal_pointpersonality = $new_girl->appeal_point ?? '';
                return $new_girl;
            });
        }

        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();

        return view('public.shop.' . $shop . '.newcast', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'new_girls' => $new_girls,
            'banners' => $banners,
        ]);
    }

    public function showNews(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        $news = News::where('shop_id', Shop::where('slug', $shop)->first()->id)
            ->where('published_status', 1)
            ->where(function ($query) {
                $query->where('published_status', 1)
                    ->orWhere(function ($q) {
                        $q->where('published_status', 2)
                            ->where('published_at', '<=', now());
                    });
            })
            ->inRandomOrder()
            ->orderBy('published_at', 'desc')
            ->paginate(4)
            ->onEachSide(0)
            ->withPath('news');
        return view('public.shop.' . $shop . '.news', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'banners' => $banners,
            'news' => $news,
        ]);
    }

    public function showNewsDetail(Request $request, string $shop, $id): View
    {
        // For now, we'll use mock data. In production, you'd fetch from database
        // $news = [
        //     'id' => $id,
        //     'title' => 'タイトルタイトルタイトルタイトルタイ',
        //     'date' => 'カテゴリ名 | 00.00.00',
        //     'image' => 'assets/img/shops/' . $shop . '/news-card-image' . $id . '.png',
        //     'content' => '本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文',
        // ];

        // // Mock previous and next news (in production, fetch from database)
        // $prevNews = $id > 1 ? [
        //     'id' => $id - 1,
        //     'title' => '前の記事のタイトル',
        // ] : null;

        // $nextNews = $id < 4 ? [
        //     'id' => $id + 1,
        //     'title' => '次の記事のタイトル',
        // ] : null;

        $news = News::find($id);
        $prevNews = News::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where(function ($query) {
            $query->where('published_status', 1)
                ->orWhere(function ($q) {
                    $q->where('published_status', 2)
                        ->where('published_at', '<=', now());
                });
        })
        ->where('id', '<', $id)
        ->orderBy('id', 'desc')
        ->first();
        $nextNews = News::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where(function ($query) {
            $query->where('published_status', 1)
                ->orWhere(function ($q) {
                    $q->where('published_status', 2)
                        ->where('published_at', '<=', now());
                });
        })
        ->where('id', '>', $id)
        ->orderBy('id', 'asc')
        ->first();
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        // dd($prevNews,$nextNews,$id);
        return view('public.shop.' . $shop . '.news-detail', [
            'news' => $news,
            'prevNews' => $prevNews,
            'nextNews' => $nextNews,
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'banners' => $banners,
        ]);
    }

    public function showEvent(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
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
        ->paginate(4)
        ->onEachSide(0)
        ->withPath('event');
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        return view('public.shop.' . $shop . '.event', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'events' => $events,
            'banners' => $banners,
        ]);
    }

    public function showEventDetail(Request $request, string $shop, $id): View
    {
        // For now, we'll use mock data. In production, you'd fetch from database
        // $event = [
        //     'id' => $id,
        //     'title' => 'イベントタイトルイベントタイトルイベントタイトル',
        //     'image' => 'assets/img/shops/' . $shop . '/event-card-' . $id . '.png',
        //     'content' => '本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文',
        // ];

        // // Mock previous and next event (in production, fetch from database)
        // $prevEvent = $id > 1 ? [
        //     'id' => $id - 1,
        //     'title' => '前のイベントのタイトル',
        // ] : null;

        // $nextEvent = $id < 4 ? [
        //     'id' => $id + 1,
        //     'title' => '次のイベントのタイトル',
        // ] : null;

        $event = Event::find($id);
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        $prevEvent = Event::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where(function($query) {
            $query->where('published_status', 1)
                ->orWhere('published_status',4)
                ->orWhere(function($query) {
                    $query->where('published_status', 2)
                        ->where('published_at', '<=', Carbon::now());
                });
        })
        ->where('id', '<', $id)
        ->orderBy('id', 'desc')
        ->first();
        // where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextEvent = Event::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where(function($query) {
            $query->where('published_status', 1)
                ->orWhere('published_status',4)
                ->orWhere(function($query) {
                    $query->where('published_status', 2)
                        ->where('published_at', '<=', Carbon::now());
                });
        })
        ->where('id', '>', $id)
        ->orderBy('id', 'asc')
        ->first();
        return view('public.shop.' . $shop . '.event-detail', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'event' => $event,
            'prevEvent' => $prevEvent,
            'nextEvent' => $nextEvent,
            'banners' => $banners,
        ]);
    }

    public function showRanking(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        $shop_unit = Shop::where('slug', $shop)->get()->first();
        $ranks = Rank::orderBy('id', 'asc')->get();
        if ( $request->has('rank_id') ) {
            $rank_id = $request->rank_id;
        } else {
            $rank_id = Rank::orderBy('id', 'asc')->first()->id;
        }
        $rankings = Ranking::leftJoin('casts', 'rankings.cast_id', '=', 'casts.id')
        ->where('rankings.shop_id', $shop_unit->id)
        ->where('casts.shop_id', $shop_unit->id)
        ->where('casts.is_public',1)
        ->where('rankings.rank_id', $rank_id)
        ->select('rankings.*', 'casts.*','rankings.rank as ranking_rank')
        ->orderBy('rankings.rank', 'asc')
        ->get();
        // dd($rankings);
        return view('public.shop.' . $shop . '.ranking', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'banners' => $banners,
            'ranks' => $ranks,
            'rankings' => $rankings,
            'rank_id' => $rank_id,
        ]);
    }

    public function showPhotoDiary(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');

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

        // if ($request->has('cast_id')) {
        //     $cast_id = $request->cast_id;
        //     if ($cast_id != '') {
        //         $query->where('diaries.cast_id', $cast_id);
        //         $query_date->where('diaries.cast_id', $cast_id);
        //     }
        // }
        if ($request->has('date')) {
            $date = $request->date;
            if ($date != '') {
                $query->whereDate('diaries.created_at', $date);
            }
        }
        $diarys = $query->orderBy('diaries.created_at', 'desc')
        // ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
        ->paginate(4)
        ->onEachSide(0)
        ->appends([
            // 'cast_id' => $request->cast_id ?? '',
            'date' => $request->date ?? '',
        ])
        ->withPath('photo-diary');

        $diarys_date = $query_date->groupBy('date')
        ->get();

        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();

        return view('public.shop.' . $shop . '.photo-diary', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'diarys' => $diarys,
            'diarys_date' => $diarys_date,
            // 'cast_id' => $request->cast_id ?? '',
            'date' => $request->date ?? '',
            'banners' => $banners,
        ]);
    }

    public function showPhotoDiaryDetail(Request $request, string $shop, string $id=null): View
    {
        $shop = $request->route('shop', 'shizuku');
        // dd($request);
        $shop_id = Shop::where('slug', $shop)->first()->id;
        if ( $id != null )
        {
            $diary = Diary::where('diaries.id', $id)
                ->where('diaries.is_public', 1)
                ->select('diaries.*')
                ->first();
        }
        $date = null;
        if ( $request->has('cast_id') && $request->has('date') ){
            $date = $request->date;
            $diary = Diary::where('cast_id', $request->cast_id)
                ->whereDate('diaries.created_at',$date)
                ->select('diaries.*')
                ->first();

        }
        $schedule = Attendance::where('cast_id', $diary->cast_id)
            ->whereRaw('DATE(attendances.start_datetime) = CURDATE()')
            ->selectRaw("DATE_FORMAT(attendances.start_datetime,'%H:%i') as start_time, DATE_FORMAT(attendances.end_datetime,'%H:%i') as end_time")
            ->first();

        $diarys_date = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
            ->where('diaries.is_public', 1)
            ->where('diaries.cast_id',$diary->cast_id)
            ->selectRaw("DATE_FORMAT(diaries.created_at, '%Y-%m-%d') as date, diaries.id")
            ->groupby('date')
            ->get();


            // Get previous and next diaries
        $prevDiary = null;
        $nextDiary = null;

        if ($diary) {
            // Get previous diary (older, lower id)
            $prevDiary = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
                ->where('diaries.is_public', 1)
                ->where('diaries.cast_id', $diary->cast_id)
                ->where('diaries.id', '<', $diary->id)
                ->select('diaries.*')
                ->orderBy('diaries.id', 'desc')
                ->first();

            // Get next diary (newer, higher id)
            $nextDiary = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
                ->where('diaries.is_public', 1)
                ->where('diaries.cast_id', $diary->cast_id)
                ->where('diaries.id', '>', $diary->id)
                ->select('diaries.*')
                ->orderBy('diaries.id', 'asc')
                ->first();
            // dd($prevDiary);
        }

        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        return view('public.shop.' . $shop . '.photo-diary-detail', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'id' => $id,
            'diary' => $diary,
            'prevDiary' => $prevDiary,
            'nextDiary' => $nextDiary,
            'diarys_date' => $diarys_date,
            'banners' => $banners,
            'schedule' => $schedule,
            'date' => $date
        ]);
    }

    public function showReview(Request $request, string $shop, string $id = null): View
    {
        $shop = $request->route('shop', 'shizuku');

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
        // $reviews = DB::select($sql)->paginate(10)->onEachSide(0)->withPath('review/' . $id);

        // $reviews = DB::select($sql);

        /* -------------------------------------------------------
        Raw SQL をページネーション可能な形に変換する処理
        ------------------------------------------------------- */
        $page = request()->get('page', 1);
        $perPage = 20;
        $offset = ($page - 1) * $perPage;

        // 件数カウント
        $countSql = "SELECT COUNT(*) AS count FROM ({$sql}) AS base";
        $total = DB::select($countSql)[0]->count;

        // ページ付き SQL
        $paginatedSql = $sql . " LIMIT {$perPage} OFFSET {$offset}";

        // 該当ページのデータ取得
        $items = DB::select($paginatedSql);

        // paginator に変換 → Blade の links() が使える！
        $reviews = new LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $page,
            [
                'path'     => url('review/' . $id),
                'pageName' => 'page'
            ]
        );


        $casts = Cast::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('is_public', 1)
        ->orderBy('rank', 'asc')
        ->get();

        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        // dd($reviews);
        return view('public.shop.' . $shop . '.review', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'reviews' => $reviews,
            'casts' => $casts,
            'banners' => $banners,
            'cast_id' => $id,
        ]);
    }

    public function showAccess(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        $shop_item = Shop::where('slug', $shop)->get()->first();
        return view('public.shop.' . $shop . '.access', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'shop_item' => $shop_item,
            'banners' => $banners,
        ]);
    }

    public function showShopList(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        $shops = Shop::where('id', '!=', 1)
        ->where('id', '!=', 8)
        ->orderBy('rank', 'asc')
        ->get();
        return view('public.shop.' . $shop . '.shop-list', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'banners' => $banners,
            'shops' => $shops,
        ]);
    }
    public function showMovie(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        // $movies = Video::where('shop_id', Shop::where('slug', $shop)->first()->id)
        // ->orderBy('updated_at', 'desc')
        // ->get();
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();

        $movies = Video::join('casts', 'videos.cast_id', '=', 'casts.id')
        ->where('casts.shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('casts.is_public', 1)
        ->where('videos.is_public', 1)
        ->orderBy('videos.updated_at', 'desc')
        ->select('videos.*', 'casts.*')
        ->paginate($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 5 : 6)
        ->onEachSide(0)
        ->withPath('movie');
        // ->get();
        // dd($movies);
        return view('public.shop.' . $shop . '.movie', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'movies' => $movies,
            'banners' => $banners,
        ]);
    }

    public function showTrans(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        $lang = $request->lang;
        // Map language codes to locale codes
        $locale = match($lang) {
            'en' => 'en',
            'zh-CN' => 'zh-CN',
            'zh-TW' => 'zh-TW',
            'ko' => 'ko',
            default => $lang,
        };
        app()->setLocale($locale);
        session(['locale' => $locale]);

        $shop_item = Shop::where('slug', $shop)->get()->first();
        return view('public.shop.' . $shop . '.trans', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'banners' => $banners,
            'lang' => $lang,
            'shop_item' => $shop_item,
        ]);
    }
}
