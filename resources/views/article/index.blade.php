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
          <a class="btn btn-outline-secondary" href="{{ action('ArticleController@create') }}">新規</a>
          <a class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal" href="#">検索</a>
        </div>
      </div>
    </div>
    @empty($data_list)
      <li class="list-group-data">
        対象のデータがありません
      </li>
    @endempty

    <div class="row" >
      <div class="col-12">
        <!-- TODO:ページネーション -->
        {{ $data_list->links() }}
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <ul class="list-group">
          @empty(count($data_list))
            <li class="list-group-data">
              対象のデータがありません
            </li>
          @endempty
          @foreach($data_list as $data)
            <li class="list-group-data">
              <div class="row">
                <div class="col-3">
                  <p>名前</p>
                </div>
                <div class="col-9">
                  <p>{{ $data['user_name'] }}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-3">
                  <p>本文</p>
                </div>
                <div class="col-9">
                  <p>{{ $data['body'] }}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-3">
                  <p>登録日</p>
                </div>
                <div class="col-9">
                  <p>{{ $data['created_at'] }}</p>
                </div>
              </div>
              @if($data['comment'])
              <div class="row">
                <div class="col-3">
                  <p>コメント</p>
                </div>
                <div class="col-9">
                  @foreach ($data['comment'] as $comment)
                    <p>{{ $comment }}</p>
                  @endforeach
                </div>
              </div>
              @endif
              <div class="row">
                <div class="col-12">
                  <div class="float-right">
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
          <a class="btn btn-outline-secondary" href="{{ action('ArticleController@create') }}">新規</a>
          <a class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal" href="#">検索</a>
        </div>
      </div>
    </div>
  </div>
@endsection
