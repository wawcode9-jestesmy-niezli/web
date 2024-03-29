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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/places', 'PlaceController@index')->name('places');
Route::get('/place/{id}', 'PlaceController@show')->name('show');
Route::get('/check/{latitude}/{longitude}', 'PlaceController@check')->name('check');
Route::get('/warsaw-ranking', 'PlaceController@wranking')->name('wranking');
Route::get('/place-ranking', 'PlaceController@pranking')->name('pranking');
Route::get('/api-place/{id}', 'PlaceController@api')->name('api');
