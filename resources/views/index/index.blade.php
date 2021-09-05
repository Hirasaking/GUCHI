@extends('layouts.common')

@include('partials.developNavi')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-12">
        <ul class="list-group">
          @empty(count($sales))
            <li class="list-group-data">
              対象のデータがありません
            </li>
          @else
            @foreach($sales as $item)
            <div>{{$item->order_id}},{{$item->product_name}}</div>
            @endforeach
          @endempty
        </ul>
      </div>
    </div>
    <div class="row" >
      <div class="col-12">
        <div class="float-right">
          <!-- TODO:リンク先追加 -->
          新規データ作成リンク
        </div>
      </div>
    </div>
  </div>
@endsection
