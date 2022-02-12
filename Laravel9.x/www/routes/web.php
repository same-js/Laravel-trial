<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ProcessUserMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('phpinfo', function () {
    echo phpinfo();
    return;
});

Route::get('queue',  function () {
    \App\Jobs\ProcessUser::dispatch();
    echo '現在処理中です。完了したらメールを送信します。';
});

Route::get('mail', function () {
    Mail::to('test@exmaple.com')->send(new ProcessUserMail);
});
