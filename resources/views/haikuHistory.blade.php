@extends('layouts.app')

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
                    <table border="1">
                      <tr width="70" class="card-header">
                        <th>投稿日</th>
                        <th>俳句</th>
                      </tr>
                      @foreach ($haiku_histories as $haikuHistory)
                      <tr>
                        <td>{{$haikuHistory->created_at}}</td>
                        <td>{{$haikuHistory->content}}</td>
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
