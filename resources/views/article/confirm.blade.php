<!doctype html>
<html lang="ja">
  <head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="p-3">
    <h1>投稿内容</h1>

    <p>よろしければ「送信」ボタンを押して下さい。</p>
    <table class="table table-bordered">
    <tr>
    <td class="table-secondary" style="width:20%">職業</td>
    <td>{{ $article->job }}</td>
    </tr>
    <tr>
    <td class="table-secondary">本文</td>
    <td>{{ $article->body }}</td>
    </tr>
    </table>

    <form action="update" method="post">
        <input type="hidden" name="job" class="form-control" id="InputJob" value="{{ $article->job }}">
        <input type="hidden" name="body" class="form-control" id="InputBody" value="{{ $article->body }}">
        @csrf
        <button type="submit" name="action" class="btn btn-primary" value="back">戻る</button>
        <button type="submit" name="action" class="btn btn-primary" value="sent">送信</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
