@extends('base')
@section('content')

<p>{{ __(config('const.is_enabled.enable')) }}</p>
<p>{{ config('const.APPLICATION.NAME') }}</p>
<!-- https://qiita.com/Ioan/items/a851ef1099718d079c8c -->

<form action="/session" method="post">
   {{ csrf_field() }}
　<select name="search" onChange="this.form.submit()">
　　<option value="test1">test1</option>
　　<option value="test2" selected>test2</option>
　　<option value="test3">test3</option>
　</select>
</form>
<!-- <input type="checkbox" name="fluits[]" value="1" {{ is_array(old("fluits")) && in_array("1", old("fluits"), true)? 'checked="checked"' : '' }}> -->
<input type="checkbox" name="ticket" value="1" {{ $items ? 'checked="checked"' : '' }}>
チェックボックス
<form method="POST" action="/session">
   {{ csrf_field() }}
	<input type="hidden" name="submit_test" value="55555">
	<input type="submit" value="送信" />

  <input type="checkbox" name="riyu" value="1" checked="checked">面白い
  <input type="checkbox" name="riyu" value="2">役に立つ
  <input type="checkbox" name="riyu" value="3">いまいち

</form>

@endsection
