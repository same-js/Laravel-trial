@extends('layouts.app')

<!-- jQueryインポート -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/home.js"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">俳句投稿ページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <hr>
                    <form name="form" method="post" return false>
                      {{-- クロスサイトリクエストフォージェリ対策に必要なトークン--}}
                      <meta name="token" content="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="投稿する俳句">投稿する俳句（最大50文字まで）</label><br>
                        <textarea id="content" name="content" cols="80" maxlength="50" required></textarea>
                      </div>
                    </form>
                    <button id="ajax_sub">送信</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
