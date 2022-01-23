<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\ScheduleController;



Route::resource('register','RegisterController');
Route::resource('login','LoginController');
Route::resource('home','HomeController');
Route::resource('logout','LogoutController');
Route::resource('habit','HabitController');

Route::resource('password/change','Auth\ChangePasswordController');



Route::get('/schedule', function () {
    return view('schedule');
});
// スケジュール登録処理
Route::post('/schedule-add', [ScheduleController::class, 'scheduleAdd'])->name('schedule-add');
// スケジュール取得処理
Route::post('/schedule-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');
// スケジュール編集処理
Route::post('/schedule-edit', [ScheduleController::class, 'scheduleEdit'])->name('schedule-edit');
// スケジュール判定処理
Route::post('/schedule-judge', [ScheduleController::class, 'scheduleJudge'])->name('schedule-judge');
