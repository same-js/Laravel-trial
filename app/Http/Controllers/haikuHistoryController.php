<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Libs\Common;

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

        // 漢字・カタカナ・ひらがな・英字・数字・記号・句点の全体に対する割合
        for ($i = 0 ; $i < count($haiku_histories) ; $i++) {
          $test       = $haiku_histories[$i]->content;
          $testLength = mb_strlen($test);

          // 各文字種の文字数を取得
          $num      = preg_match_all('/[0-9]/'       , $test);
          $alphabet = preg_match_all('/[[:alpha:]]/' , $test);
          $hiragana = preg_match_all('/[ぁ-んー]/u'  , $test);
          $katakana = preg_match_all('/[ァ-ヶ]/u'    , $test);
          $kanji    = preg_match_all('/[一-龠]/u'    , $test);
          $kuten    = mb_substr_count($test          , "、");

          // 各文字種が全体に占める割合を算出
          $common = new Common();
          $common->setParameterForCalc($testLength, 1);
          $haiku_histories[$i]->num      = $common->calcPercentage($num);
          $haiku_histories[$i]->alphabet = $common->calcPercentage($alphabet);
          $haiku_histories[$i]->hiragana = $common->calcPercentage($hiragana);
          $haiku_histories[$i]->katakana = $common->calcPercentage($katakana);
          $haiku_histories[$i]->kanji    = $common->calcPercentage($kanji);
          $haiku_histories[$i]->kuten    = $common->calcPercentage($kuten);
          // 一旦、記号は「数字、英語、平仮名、片仮名、漢字、句点を除く全ての文字」と定義する
          // 時間があるときに厳密な再定義を行い、算出ロジックも修正する
          $haiku_histories[$i]->kigou    = $common->calcPercentage(
              $testLength-($num+$alphabet+$hiragana+$katakana+$kanji+$kuten));
        }
        return view ('haikuHistory', ['haiku_histories'=>$haiku_histories]);
    }
}
