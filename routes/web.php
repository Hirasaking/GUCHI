<?php

    Route::get('/', 'ArticleController@index');

// 全ユーザ
Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
  // ユーザ一覧

    Route::get('rank', 'ArticleController@rank');

    Route::get('create', 'ArticleController@create');
    Route::post('create', 'ArticleController@store');

    Route::get('edit/{id}', 'ArticleController@edit');
    Route::post('edit', 'ArticleController@update');

    Route::get('result', 'ArticleController@result');
    Route::get('logout', 'ArticleController@index');
});

// 管理者以上
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
  // ユーザ登録
  Route::get('/account/regist', 'AccountController@regist')->name('account.regist');
  Route::post('/account/regist', 'AccountController@createData')->name('account.regist');

  // ユーザ編集
  Route::get('/account/edit/{user_id}', 'AccountController@edit')->name('account.edit');
  Route::post('/account/edit/{user_id}', 'AccountController@updateData')->name('account.edit');

  // ユーザ削除
  Route::post('/account/delete/{user_id}', 'AccountController@deleteData');
});
// システム管理者のみ
Route::group(['middleware' => ['auth', 'can:master-only']], function () {
   
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/goutte', function() {
//   $crawler = Goutte::request('GET', 'http://www.uplink.co.jp/movie-show/nowshowing');
//
//   $crawler->filter('article.post h2 a')->each(function ($node) {
//     echo $node->text();
//     echo '<br/>';
//   });
//   return view('welcome');
//});