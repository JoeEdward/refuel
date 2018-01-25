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
Route::view('/home', 'pages.start');

//Login Routes

Route::view('/failed', 'users.fail')->name("login");
Route::get('/login', 'loginController@new');
Route::get('/login/callback', 'loginController@callback');
Route::view('/dashboard', 'users.dashboard')->name('dashboard')->middleware('auth');
Route::get('/logout', 'loginController@destroy');

Route::get('/dashboard/additem', 'FoodController@make');
Route::post('/dashboard/additem', 'FoodController@store');

Route::get('items', 'FoodController@index');
Route::get('/item/{item}', 'FoodController@show');
Route::get('/item/{item}/edit', 'FoodController@edit');
Route::post('/item/{item}/edit', 'FoodController@update');
Route::get('/item/{item}/delete', 'FoodController@destroy');

Route::get('/menu', 'FoodController@index');

