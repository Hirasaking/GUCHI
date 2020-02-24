@extends('base')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center">データ入力</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <!-- TODO: actionの指定 -->
        <form method="POST" action="" id="myform">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach( $errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          {{ csrf_field() }}
          <div class="form-group">
            <label>コメントする投稿</label>
            <input type="text" name="event" value="第3回 読書会" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>コメント</label>
            <textarea name="body" class="form-control"></textarea>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="float-right">
          <!-- TODO: route()を使う -->
          <a class="btn btn-outline-secondary" href="/">コメントする</a>
        </div>
      </div>
    </div>
  </div>
@endsection
