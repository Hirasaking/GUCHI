<!doctype html>
<html lang="ja">
  <head>
    <title>Laravelチュートリアル</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="p-3">
    <h1>Article</h1>

    <p><a href="/create" class="btn btn-primary">投稿する</a></p>
    <p><a href="/post_history" class="btn btn-primary">自分の投稿一覧</a></p>
    <p><a href="/rank" class="btn btn-primary">ランキング</a></p>
    <p><a href="/search" class="btn btn-primary">検索する</a></p>
    <p><a href="/page" class="btn btn-primary">会員専用</a></p>
    <p><a href="/login" class="btn btn-primary">ログイン</a></p>
    <p><a href="/logout" class="btn btn-primary">ログアウト</a></p>
    <p><a href="/register" class="btn btn-primary">新規登録</a></p>

    @foreach ($articles as $article)
    <div class="card mb-2">
      <div style="border:solid 1px #bbb;">
        <p style="font-weight:bold;">{{ $article->job }}</p>
        <p class="card-text">{{ $article->body }}</p>
        {{ $article->updated_at }}

            <form method="get" action="/report/{{ $article->id }}">
            {{ csrf_field() }}
            <input type="hidden" class="form-control" name="id" value="{{ $article->id }}">
            <button type="submit" class="btn btn-primary">通報</button>
            </form>

        <form method="post" action="/edit">
            {{ csrf_field() }}
            <input type="hidden" class="form-control" name="id" value="{{ $article->id }}">
            <button type="submit" class="btn btn-primary">共感 {{ $article->like_count }}</button>
            </form>
        
        <?php //<a href="/delete/{{ $article->id }}" class="card-link">削除</a> ?>
      </div>
    </div>
    @endforeach

    <p><a href="/create" class="btn btn-primary">投稿する</a></p>
    {{ $articles->links() }}

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>