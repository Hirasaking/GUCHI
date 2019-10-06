<!doctype html>
<html lang="ja">
  <head>
    <title>Laravelチュートリアル</title>
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
          <input type="text" name="job" class="form-control" id="InputJob" value="{{ old('job') }}">
      </div>
<!--
      <div class="form-image_url">
          <input type="file" name="image_url">
      </div>
-->
      <div class="form-group">
          <label for="bodyInput">内容</label>
          <textarea name="body" id="InputBody" class="form-control" rows="3" value="{{ old('body') }}"></textarea>
      </div>
      @csrf
      <button type="submit" class="btn btn-primary">投稿する</button>
    </form>

    <a href="/" class="btn btn-primary">一覧に戻る</a>
  </body>
</html>
