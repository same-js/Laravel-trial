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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** Ajax経由で俳句を投稿するメソッドの呼び出し */
Route::post('/haiku_history_update', 'HomeController@inserthaikuByAjax');

// 俳句投稿ページ
Route::get('/home', 'HomeController@index')->name('home');

// 俳句投稿履歴ページ
Route::get('/haiku_history', 'haikuHistoryController@index')->name('haikuHistory');
