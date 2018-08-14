@extends('layouts.common')
 
@section('title')
    <h1>ARTICLE LIST</h1>
@endsection
 
@include('layouts.head')
 
@section('content')
@if(Auth::check())
    <p>USER: {{$user->name . '(' . $user->email . ')' }}</p>
@else
<p>ログインしていません（<a href="/login">ログイン</a>｜<a href="/register">登録</a>）</p>
@endif
@endsection
 
@include('layouts.footer')