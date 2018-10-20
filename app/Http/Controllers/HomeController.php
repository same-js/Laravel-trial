<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
    * Ajax経由で俳句を投稿する。
    */
    protected function inserthaikuByAjax (Request $request) {
      // 時間があればより高いセキュリティで実装し直す（createメソッド等）
      $haikuHistory = new \App\HaikuHistory;
      $haikuHistory->user_id = (int)Auth::id();
      $haikuHistory->content = $request->content;
      $haikuHistory->save();
    }
}
