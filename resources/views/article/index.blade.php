@extends('base')
@section('content')
  <div class="container">
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">検索条件</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="filter" method="get">
            <div class="modal-body">
              <!-- TODO:検索フォーム -->
              <form method="GET" action="{{ route('index') }}" id="myform">
                <div class="form-group">
                  <label>名前</label>
                  <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                  <label for="sex">性別</label>
                  <select id="sex" name="sex" class="form-control">
                    <option value="">---------</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">指定無し</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>備考</label>
                  <textarea name="memo" class="form-control"></textarea>
                </div>
              </form>
            </div>
          </form>
          <div class="modal-footer">
            <a class="btn btn-outline-secondary" data-dismiss="modal">戻る</a>
            <button type="submit" class="btn btn-outline-secondary" form="filter">検索</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a class="btn btn-secondary filtered" style="visibility:hidden" href="/?page=1">検索を解除</a>
        <div class="float-right">
          <!-- TODO リンク先追加 -->
          {{Form::open(['method' => 'get', 'route' => 'index'])}}
          {{Form::submit('男性', ['name' => 'sex', 'class' => 'btn btn-outline-secondary'])}}
          <a class="btn btn-outline-secondary" href="{{ action('ItemController@create') }}">新規</a>
          <a class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal" href="#">検索</a>
        </div>
      </div>
    </div>
    @empty($items)
      <li class="list-group-item">
        対象のデータがありません
      </li>
    @endempty

    <div class="row" >
      <div class="col-12">
        <!-- TODO:ページネーション -->
        {{ $items->links() }}
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <ul class="list-group">
          @empty(count($items))
            <li class="list-group-item">
              対象のデータがありません
            </li>
          @endempty
          @foreach($items as $item)
            <li class="list-group-item">
              <div class="row">
                <div class="col-3">
                  <p>名前</p>
                </div>
                <div class="col-9">
                  <p>{{ $item->name }}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-3">
                  <p>登録日</p>
                </div>
                <div class="col-9">
                  <p>{{ $item->created_at }}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="float-right">
                    <!-- TODO:リンク先追加 -->
                    <a class="btn btn-outline-secondary " href="{{ route('show', ['id' => $item->id]) }}">詳細</a>
                    <!-- TODO:リンク先追加 -->
                    <a class="btn btn-outline-secondary " href="{{ route('edit', ['id' => $item->id]) }}">編集</a>
                    <!-- TODO:リンク先追加 -->
                    <a class="btn btn-outline-secondary " href="{{ route('delete', ['item' => $item]) }}">削除</a>
                  </div>
                </div>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="row" >
      <div class="col-12">
        <div class="float-right">
          <!-- TODO:リンク先追加 -->
          <a class="btn btn-outline-secondary" href="{{ action('ItemController@create') }}">新規</a>
          <a class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal" href="#">検索</a>
        </div>
      </div>
    </div>
  </div>
@endsection



<!-- <!doctype html>
<html lang="ja">
  <head>
    <title>投稿画面</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="p-3">
    <h1>入力画面</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/article/confirm" method="post">
      <div class="form-group">
          <label for="jobInput">職業</label>
          @if ($errors->has('title'))
              @foreach($errors->get('title') as $title_error)
              <ul>
                  <li>
                      {{ $title_error }}
                  </li>
              </ul>
              @endforeach
          @endif
          <input type="text" name="job" class="form-control" id="InputJob" value="{{ old('job') }}">
      </div>

      <div class="form-group">
          <label for="bodyInput">内容</label>
          @if ($errors->has('content'))
              @foreach($errors->get('content') as $content_error)
              <ul>
                  <li>
                      {{ $content_error }}
                  </li>
              </ul>
              @endforeach
           @endif
           <textarea type='text' name="body" id="InputBody" class="form-control" rows="3">{{ old('body') }}</textarea>
      </div>
      @csrf
      <button type="submit" class="btn btn-primary">投稿する</button>
    </form>

    <a href="/" class="btn btn-primary">一覧に戻る</a>
  </body>
</html> -->
