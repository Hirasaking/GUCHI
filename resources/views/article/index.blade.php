@extends('layouts.app')
@section('content')
    <h1>Article</h1>
    <p>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($errors->has('key_word1'))
            {{ $errors->first('key_word1') }}
        @endif

        <!-- フラッシュメッセージ -->
        @if (session('select_sample'))
                {{ session('select_sample') }}
        @endif
        <form method="post" action="/">
            {{ csrf_field() }}
            <div class="form-group">
              <p>
                <select name="select_sample">
                  <option value="1" @if(session('select_sample') == '1') selected  @endif>選択肢1</option>
                  <option value="2" @if(session('select_sample') == '2') selected  @endif>選択肢2</option>
                  <option value="3" @if(session('select_sample') == '3') selected  @endif>選択肢3</option>
                </select>
              </p>
              <p>
                <input type="checkbox" name="checkbox1" value="1" @if(session('checkbox1') == '1') checked="checked" @endif>関東</input>
                <input type="checkbox" name="checkbox2" value="1" @if(session('checkbox2') == '1') checked="checked" @endif>関西</input>
                <input type="checkbox" name="checkbox3" value="1" @if(session('checkbox3') == '1') checked="checked" @endif>九州</input>
              </p>

                <label>検索ワード1</label>
                <input value="@if(session('key_word1')){{session('key_word1')}}@endif" type="text" class="form-control" id="jobInput" name="key_word1">
            </div>
            <button type="submit" class="btn btn-primary">検索</button>
        </form>

        <a href="/search" class="btn btn-primary">検索する</a>
        <a href="/create" class="btn btn-primary">投稿する</a>
        <a href="/search" class="btn btn-primary">検索する</a>
        <a href="/history" class="btn btn-primary">投稿履歴</a>
        <a href="/login" class="btn btn-primary">ログイン</a>
        <a href="/logout" class="btn btn-primary">ログアウト</a>
        <a href="/register" class="btn btn-primary">新規登録</a>
    </p>

    @foreach ($articles as $article)
    <div class="card mb-2">
      <div style="border:solid 1px #bbb;">
        <p style="font-weight:bold;">{{ $article->job }}</p>
        <p class="card-text">{{ $article->body }}</p>
        {{ $article->updated_at }}

      </div>
    </div>
    @endforeach

    <p><a href="/create" class="btn btn-primary">投稿する</a></p>
    {{ $articles->render() }}

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
@endsection
