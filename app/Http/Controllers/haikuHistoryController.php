<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class haikuHistoryController extends Controller
{
      public function __construct()
    {
        // 認証必須
        $this->middleware('auth');
    }

    public function index() {
      // DBからselect
      $haiku_histories = DB::table('haiku_histories')
        ->select('created_at','content')
        ->where('user_id', (int)Auth::id() )
        ->get();
        
        return view ('haikuHistory', ['haiku_histories'=>$haiku_histories]);
    }

  public static  function calcPercentage($length, $maxLength) {
    return round($length / $maxLength*100, 2);
  }
}
