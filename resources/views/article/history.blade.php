@extends('layouts.app')

@section('content')
    <h1>Article</h1>

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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
@endsection
