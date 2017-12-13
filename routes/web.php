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

Route::view('/', 'pages.start')->name('home');


//Login Routes

Route::view('/failed', 'users.fail')->name('login');
Route::view('/login', 'users.new');
Route::get('/login/google', 'loginController@new');
Route::get('/login/callback', 'loginController@callback');
Route::view('/dashboard', 'users.dashboard')->name('dashboard')->middleware('auth');
Route::get('/logout', 'loginController@destroy');


