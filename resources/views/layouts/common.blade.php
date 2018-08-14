<!doctype html>
<html lang="ja">
  <head>
    @yield('header')
  </head>
  <body class="p-3">
    @yield('title')
    @yield('content')

    @foreach ($articles as $article)
    <div class="card mb-2">
      <div style="border:solid 1px #bbb;">
        <?php //<h4 class="card-title">{{ $article->title }}</h4> ?>
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

    @yield('footer')
  </body>
</html>