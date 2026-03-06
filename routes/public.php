<?php

use App\Http\Controllers\Public\GroupController;
use App\Http\Controllers\Public\ShopController;
use App\Http\Controllers\Public\TouchVipDiaryController;
use App\Http\Middleware\PublicAvailable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\AuthenticateMultiple;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\Public\ShizukuController;
use App\Http\Controllers\Public\GroupsController;
use App\Http\Controllers\Public\RecruitController;

// Route::middleware([AuthenticateMultiple::class])->group(function () {


// }
// Route::middleware('guest')->group(function () {
//     Route::get('login', [AuthenticatedSessionController::class, 'frontLogin'])
//         ->name('login');

//     Route::post('login', [AuthenticatedSessionController::class, 'store']);
// });

// Route::middleware([PublicAvailable::class])->name('public.')->group(function () {

Route::name('public.')->group(function () {
        // Route::get('/qrcode/{memberId}', [QRCodeController::class, 'generate']);
    // Route::get('/qrcode/{memberId}', function ($memberId) {
    //     dd($memberId);
    //     return view('public.qrcode', ['memberId' => $memberId]);
    // });
    /**
     * Group routes
     *
     * @see \App\Http\Controllers\Public\GroupController
     */
    Route::prefix('/')->name('group.')->group(function () {
        Route::get('/', [GroupsController::class, 'showHome'])->name('home');
        Route::get('home', [GroupsController::class, 'showHome'])->name('home-v2');
        Route::get('/front', [GroupController::class, 'showFront'])->name('front');
        Route::get('shop', [GroupController::class, 'showShop'])->name('shop');
        Route::get('schedule', [GroupController::class, 'showSchedule'])->name('schedule');
        Route::get('event', [GroupController::class, 'showEvent'])->name('event');
        Route::get('event/{id}', [GroupController::class, 'showEventDetail'])->name('event.detail');
        Route::get('search', [GroupController::class, 'showSearch'])->name('search');
        Route::post('search', [GroupController::class, 'searchResult']);
        Route::get('searchResult', [GroupController::class, 'searchResult'])->name('searchResult');
        Route::post('searchResult', [GroupController::class, 'searchResult'])->name('searchResult.post');
        Route::get('pickup', [GroupController::class, 'showPickup'])->name('pickup');
        Route::get('privacy-policy', [GroupController::class, 'showPrivacyPolicy'])->name('privacy-policy');
        Route::get('personal-policy', [GroupController::class, 'showPersonalPolicy'])->name('personal-policy');
        Route::get('newcomer', [GroupController::class, 'showNewcomer'])->name('newcomer');
        Route::middleware([AuthenticateMultiple::class])->group(function () {
            Route::get('mypage', [GroupController::class, 'showMypage'])->name('mypage');
            Route::get('memberinfo', [GroupController::class, 'showMemberInfo'])->name('memberinfo');
            Route::post('memberinfo', [GroupController::class, 'updateMemberInfo'])->name('memberinfo.update');
            Route::get('password', [GroupController::class, 'showPassword'])->name('password');
            Route::post('password', [GroupController::class, 'updatePassword'])->name('password.update');
            Route::get('review', [GroupController::class, 'wirteReview'])->name('review');
        });
        Route::get('newslist/{shop}', [GroupController::class, 'showNewsList'])->name('newslist');
        Route::get('newsdetail/{id}', [GroupController::class, 'showNewsDetail'])->name('newsdetail');
        // Route::get('twitter', [GroupController::class, 'showTwitter'])->name('twitter');
    });
    Route::prefix('groups')->name('groups.')->group(function () {
        Route::get('/', [GroupsController::class, 'showHome'])->name('home');
        Route::get('home', [GroupsController::class, 'showHome'])->name('home-v2');
        // Route::get('/front', [GroupController::class, 'showFront'])->name('front');
        Route::get('shop', [GroupsController::class, 'showShop'])->name('shop');
        Route::get('schedule', [GroupsController::class, 'showSchedule'])->name('schedule');
        Route::get('event', [GroupsController::class, 'showEvent'])->name('event');
        Route::get('event/{id}', [GroupsController::class, 'showEventDetail'])->name('event.detail');
        Route::get('search', [GroupController::class, 'showSearch'])->name('search');
        Route::post('search', [GroupController::class, 'searchResult']);
        Route::get('searchResult', [GroupController::class, 'searchResult'])->name('searchResult');
        Route::post('searchResult', [GroupController::class, 'searchResult'])->name('searchResult.post');
        Route::get('pickup', [GroupsController::class, 'showPickup'])->name('pickup');
        Route::get('privacy-policy', [GroupController::class, 'showPrivacyPolicy'])->name('privacy-policy');
        Route::get('personal-policy', [GroupController::class, 'showPersonalPolicy'])->name('personal-policy');
        Route::get('newcomer', [GroupController::class, 'showNewcomer'])->name('newcomer');
        Route::middleware([AuthenticateMultiple::class])->group(function () {
            Route::get('mypage', [GroupController::class, 'showMypage'])->name('mypage');
            Route::get('memberinfo', [GroupController::class, 'showMemberInfo'])->name('memberinfo');
            Route::post('memberinfo', [GroupController::class, 'updateMemberInfo'])->name('memberinfo.update');
            Route::get('password', [GroupController::class, 'showPassword'])->name('password');
            Route::post('password', [GroupController::class, 'updatePassword'])->name('password.update');
            Route::get('review', [GroupController::class, 'wirteReview'])->name('review');
        });
        Route::get('newslist/{shop}', [GroupController::class, 'showNewsList'])->name('newslist');
        Route::get('newsdetail/{id}', [GroupController::class, 'showNewsDetail'])->name('newsdetail');
        Route::get('photodiary', [GroupsController::class, 'showPhotoDiary'])->name('photodiary');
        Route::get('newface', [GroupsController::class, 'showNewFace'])->name('newface');
        Route::get('movie', [GroupsController::class, 'showMovie'])->name('movie');
        Route::get('girl-search', [GroupsController::class, 'showGirlSearch'])->name('girl-search');
        Route::post('girl-search', [GroupsController::class, 'showGirlSearch']);
        // Route::get('twitter', [GroupController::class, 'showTwitter'])->name('twitter');
    });

    /**
     * Recruit routes
     */
    Route::prefix('recruit')->name('recruit.')->group(function () {
        Route::get('male', [RecruitController::class, 'showMale'])->name('male');
        Route::get('female', [RecruitController::class, 'showFemale'])->name('female');
        Route::post('submit', [RecruitController::class, 'submitForm'])->name('submit');
    });
    /**
     * Shop routes
     *
     * @see \App\Http\Controllers\Public\ShopController
     */
    $shop_list = ['shizuku', 'miyabi', 'pussycat', 'en', 'siroganeze', 'lovestory'];
    // $shop_list = ['shizuku', 'miyabi', 'pussycat', 'en', 'siroganeze', 'lovestory'];
    Route::prefix('{shop}')->name('shop.')->whereIn('shop', $shop_list)->group(function () {
        Route::get('/', [ShopController::class, 'showHome'])->name('home');
        Route::get('cast/{id}', [ShopController::class, 'showCastProfile'])->name('cast.profile');
        Route::get('ranking', [ShopController::class, 'showRanking'])->name('ranking');
        Route::get('event', [ShopController::class, 'showEvent'])->name('event');
        Route::get('event/{id}', [ShopController::class, 'showEventDetail'])->name('event.detail');
        Route::get('about', [ShopController::class, 'showAbout'])->name('about');
        Route::get('fee', [ShopController::class, 'showFee'])->name('fee');
        Route::get('diary', [ShopController::class, 'showDiary'])->name('diary');
        Route::get('diarylist', [ShopController::class, 'showDiaryList'])->name('diarylist');
        Route::get('diarydetail/{id}/{date?}', [ShopController::class, 'showDiaryDetail'])->name('diarydetail');
        Route::get('schedule', [ShopController::class, 'showSchedule'])->name('schedule');
        Route::get('newcomer', [ShopController::class, 'showNewcomer'])->name('newcomer');
        Route::get('castlist', [ShopController::class, 'showCastlist'])->name('castlist');
        Route::get('reviewlist/{id?}', [ShopController::class, 'showReviewlist'])->name('reviewlist');
        // Route::get('reviewlist/{id?}', [ShopController::class, 'showReviewdelist'])->name('reviewdetail');
        Route::get('newslist', [ShopController::class, 'showNewsList'])->name('newslist');
        Route::get('movielist', [ShopController::class, 'showMovieList'])->name('movielist');
        Route::get('newsdetail/{id}', [ShopController::class, 'showNewsDetail'])->name('newsdetail');
    });

    Route::prefix('shops')->name('shops.')->group(function () {
        $shop_list = ['shizuku', 'miyabi', 'pussycat', 'en', 'siroganeze', 'lovestory'];
        Route::prefix('{shop}')->name('shop.')->whereIn('shop', $shop_list)->group(function () {
            Route::get('/', [ShizukuController::class, 'showHome'])->name('home');
            Route::get('system', [ShizukuController::class, 'showSystem'])->name('system');
            Route::get('profile/{id?}', [ShizukuController::class, 'showProfile'])->name('profile');
            Route::get('castlist', [ShizukuController::class, 'showCastlist'])->name('castlist');
            Route::get('schedule', [ShizukuController::class, 'showSchedule'])->name('schedule');
            // Route::post('schedule', [ShizukuController::class, 'showSchedule'])->name('schedule.post');
            Route::get('newcast', [ShizukuController::class, 'showNewcast'])->name('newcast');
            Route::get('news', [ShizukuController::class, 'showNews'])->name('news');
            Route::get('news/{id}', [ShizukuController::class, 'showNewsDetail'])->name('news.detail');
            Route::get('event', [ShizukuController::class, 'showEvent'])->name('event');
            Route::get('event/{id}', [ShizukuController::class, 'showEventDetail'])->name('event.detail');
            Route::get('ranking/{rank_id?}', [ShizukuController::class, 'showRanking'])->name('ranking');
            Route::get('photo-diary', [ShizukuController::class, 'showPhotoDiary'])->name('photo-diary');
            Route::get('photo-diary/{id}', [ShizukuController::class, 'showPhotoDiaryDetail'])->name('photo-diary.detail');
            Route::get('review/{id?}', [ShizukuController::class, 'showReview'])->name('review');
            Route::get('access', [ShizukuController::class, 'showAccess'])->name('access');
            Route::get('shop-list', [ShizukuController::class, 'showShopList'])->name('shop-list');
            Route::get('system', [ShizukuController::class, 'showSystem'])->name('system');
            Route::get('movie', [ShizukuController::class, 'showMovie'])->name('movie');
            Route::get('trans/{lang}', [ShizukuController::class, 'showTrans'])->name('trans');
        });
        // Route::prefix('shizuku')->name('shizuku.')->group(function () {
        //     Route::get('/', [ShizukuController::class, 'showHome'])->name('home');
        //     Route::get('system', [ShizukuController::class, 'showSystem'])->name('system');
        //     Route::get('profile', [ShizukuController::class, 'showProfile'])->name('profile');
        //     Route::get('castlist', [ShizukuController::class, 'showCastlist'])->name('castlist');
        //     Route::get('schedule', [ShizukuController::class, 'showSchedule'])->name('schedule');
        // });
    });
});

/**
 * Touch VIP diary
 *
 * @see \App\Http\Controllers\Public\TouchVipDiaryController
 */
Route::prefix('touchvip/diary')->name('touchvip.diary.')->group(function () {
    Route::get('{slug}', [TouchVipDiaryController::class, 'show'])->name('detail');
    Route::get('{cast_id}/{month}', [TouchVipDiaryController::class, 'index'])->name('index');
});
