<!doctype html>
<html lang="ja">
  <head>
    <title>Laravelチュートリアル</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="p-3">
    <h1>投稿確認</h1>
{{$article}}
    <form method="post" action="/update">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="jobInput">職業</label>
        <input type="text" class="form-control" id="jobInput" name="job" value="{{$article->job}}" disabled="disabled">
      </div>
      <div class="form-group">
        <label for="bodyInput">内容</label>
        <input type="text" class="form-control" id="jobInput" name="body" rows="3" value="{{$article->body}}" disabled="disabled">
      </div>
      <button type="submit" class="btn btn-primary">投稿する</button>
    </form>


<div class="alert alert-primary" role="alert">
      新規追加しました。
      <a href="/" class="btn btn-primary">一覧に戻る</a>
    </div>
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>