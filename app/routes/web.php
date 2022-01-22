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

Route::resource('register','RegisterController');
Route::resource('login','LoginController');
Route::resource('home','HomeController');
Route::resource('logout','LogoutController');
Route::resource('habit','HabitController');

Route::resource('password/change','Auth\ChangePasswordController');



Route::get('/calendar', function () {
    return view('calendar');
});
