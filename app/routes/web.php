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



Route::resource('register','RegisterController',['only'=>['index','store']]);
Route::resource('login','LoginController',['only'=>['index','store']]);
Route::resource('home','HomeController');
Route::resource('logout','LogoutController',['only'=>['index']]);
Route::resource('habit','HabitController',['only'=>['create','store','show','edit','update','destroy']]);

Route::resource('password/change','Auth\ChangePasswordController',['only'=>['index','store']]);

Route::resource('profile','ProfileController',['only'=>['index','show','store']]);

Route::resource('withdraw','WithdrawController',['only'=>['index','destroy']]);
Route::resource('post', 'PostController');
Route::resource('search', 'SearchController');

// スケジュール用のコントローラー（コンフリクト解決のために追記)

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



