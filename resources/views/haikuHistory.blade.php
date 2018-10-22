@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="css/haikuHistory.css" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">俳句投稿履歴ページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    あなたの投稿した俳句一覧です。
                    <br>
                    <table border="1" style="border-color: #BBBBBB;">
                      <tr class="card-header">
                        <th rowspan="2">投稿日</th>
                        <th rowspan="2">俳句</th>
                        <th colspan="7">分析結果</th>
                      </tr>
                      <tr class="card-header">
                        <th class="analysisColmn">漢字</th>
                        <th class="analysisColmn">平仮名</th>
                        <th class="analysisColmn">片仮名</th>
                        <th class="analysisColmn">英字</th>
                        <th class="analysisColmn">数字</th>
                        <th class="analysisColmn">記号</th>
                        <th class="analysisColmn">句点</th>
                      </tr>
                      @foreach ($haiku_histories as $haikuHistory)
                      <tr>
                        <td>{{$haikuHistory->created_at}}</td>
                        <td>{{$haikuHistory->content}}</td>
                        <td class="analysisColmn">{{$haikuHistory->kanji}}%</td>
                        <td class="analysisColmn">{{$haikuHistory->hiragana}}%</td>
                        <td class="analysisColmn">{{$haikuHistory->katakana}}%</td>
                        <td class="analysisColmn">{{$haikuHistory->alphabet}}%</td>
                        <td class="analysisColmn">{{$haikuHistory->num}}%</td>
                        <td class="analysisColmn">{{$haikuHistory->kigou}}%</td>
                        <td class="analysisColmn">{{$haikuHistory->kuten}}%</td>
                        @endforeach
                      </tr>
                    </table>
                    <hr>
                    <a href="./home">俳句投稿ページ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
