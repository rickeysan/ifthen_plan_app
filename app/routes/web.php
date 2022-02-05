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

// 初期画面
Route::get('/',function(){
    return view('welcome');
});

Route::resource('register','RegisterController',['only'=>['index','store']]);
Route::resource('login','LoginController',['only'=>['index','store']]);
Route::resource('home','HomeController',['only'=>['index']]);
Route::resource('logout','LogoutController',['only'=>['index']]);
Route::resource('habit','HabitController',['only'=>['create','store','show','edit','update','destroy']]);

Route::resource('password/change','Auth\ChangePasswordController',['only'=>['index','store']]);

Route::resource('profile','ProfileController',['only'=>['index','show','store']]);

Route::resource('withdraw','WithdrawController',['only'=>['index','destroy']]);
Route::resource('post', 'PostController',['only'=>['show']]);
Route::resource('search', 'SearchController',['only'=>['index','show']]);
Route::resource('example', 'ExampleController',['only'=>['show']]);


// Route::get('/schedule',[ScheduleController::class,'scheduleIndex']);
// スケジュール登録処理
Route::post('schedule-add/{id}', [ScheduleController::class, 'scheduleAdd']);
// Route::post('schedule-add/{id}', function($id){
//     return $id;
// });
// スケジュール取得処理
Route::post('/schedule-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');
// スケジュール編集処理
Route::post('/schedule-edit/{id}', [ScheduleController::class, 'scheduleEdit'])->name('schedule-edit');
// スケジュール判定処理
Route::post('/schedule-judge', [ScheduleController::class, 'scheduleJudge'])->name('schedule-judge');



Route::get('/like/{id}', 'LikeController@addLike')->name('addlike');
Route::get('/unlike/{id}', 'LikeController@removeLike')->name('removelike');
Route::get('/like-show','LikeController@show');



Route::get('hello/{id}/{pass?}',function($id,$pass){
    return $pass;
});

// Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
// Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::resource('forget-password', 'ForgetPasswordController');
Route::resource('reset-password', 'ResetPasswordController');


use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

Route::get('/testmail', function(){
    Mail::to('test@example.com')->send(new TestMail);
    return 'メール送信完了';
});
