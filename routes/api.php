<?php

use App\Http\Controllers\Public\TouchVipDiaryController;
use App\Http\Controllers\Api\ScheduleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\QRCodeController;
use App\Http\Controllers\Api\CastController;
use App\Http\Controllers\Api\WorkController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\CkeditorController;
// use App\Http\Controllers\Admin\ScheduleController as NormalSchedule;
use Illuminate\Support\Facades\Log;

// Route::get('/twitter', [QRCodeController::class, 'showTwitter']);
Route::get('/diary/{cast_id}', [TouchVipDiaryController::class, 'get']);
Route::get('/qrcode/{memberId}', [QRCodeController::class, 'generate']);

Route::post('/casts-schedule', [ScheduleController::class, 'getCastsSchedule']);
Route::post('/casts-schedule-shop', [ScheduleController::class, 'getCastsScheduleShop']);
Route::post('/diary-detail', [ScheduleController::class, 'getDiaryDetail']);
// スケジュール関連のAPIルート
Route::middleware(['auth:sanctum'])->prefix('schedule')->group(function () {
    // Route::prefix('schedule')->group(function () {
    Route::post('/', [ScheduleController::class, 'showCastsSchedule']);
    Route::post('/updateattendance', [ScheduleController::class, 'updateAttendanceTime']);
    Route::post('/updatereservation', [ScheduleController::class, 'updateReservationTime']);
    Route::post('/deletereservation', [ScheduleController::class, 'deleteReservationTime']);
});
Route::middleware(['auth:sanctum'])->prefix('work')->group(function () {
    // Route::prefix('schedule')->group(function () {
    Route::post('/', [WorkController::class, 'showCastsSchedule']);
    Route::post('/updateattendance', [WorkController::class, 'updateAttendanceTime']);
    Route::post('/deleteattendance', [WorkController::class, 'deleteAttendance']);
});
Route::middleware('auth:sanctum')->prefix('member')->group(function () {
// Route::prefix('member')->group(function () {
    Route::post('/update', [MemberController::class, 'update']);
    Route::post('/qrupdate', [MemberController::class, 'qrupdate']);
    Route::post('/getValues', [MemberController::class, 'getValues']);
    Route::post('/extend_update', [MemberController::class, 'extendUpdate']);
});

Route::middleware(['auth:sanctum'])->prefix('cast')->group(function () {
    // Route::prefix('schedule')->group(function () {
    Route::post('/sorted', [CastController::class, 'getSortedCast']);
    Route::post('/updateranking', [CastController::class, 'updateRanking']);
});
Route::middleware(['auth:sanctum'])->prefix('review')->group(function () {
    // Route::prefix('schedule')->group(function () {
    Route::post('/create', [ReviewController::class, 'createReview']);
});

Route::middleware(['auth:sanctum'])->prefix('ckeditor')->group(function () {
    // Route::prefix('schedule')->group(function () {
    Route::post('/news_upload', [CkeditorController::class, 'newsUpload']);
    Route::post('/event_upload', [CkeditorController::class, 'eventUpload']);
});


Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
