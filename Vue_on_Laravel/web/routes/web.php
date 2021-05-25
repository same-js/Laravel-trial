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

// SPAのため、どのページへのアクセスでも同じviewを返す
// URLごとの描画は、クライアント側で行う
Route::get('/{any?}', fn() => view('index') )->where('any', '.+');
// ちなみに、上記はPHP7.4から導入されたアロー関数を用いた書き方
// つまり、下記と同じ
// Route::get('/{any?}', function () { view('index'); } );
