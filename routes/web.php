<?php

// アクセス時のルーティング
Route::get('searchSample', 'SearchController@index');
Route::post('searchSample', 'SearchController@store');

// アクセス時のルーティング
Route::get('sample/vali', 'ValiController@index');
Route::post('sample/vali', 'ValiController@receiveData');


    Route::get('logout', 'ArticleController@index');
    Route::get('/', 'ArticleController@index');
    Route::post('/', 'ArticleController@store');
    // Route::post('/', 'ArticleController@store', function(SearchRequest $request){});
    Route::get('rank', 'ArticleController@rank');

//BASIC認証
Route::group(['middleware' => 'auth.very_basic'], function() {
});

//投稿フォームページ
Route::group(['middleware' => 'auth'], function() {
    //新規投稿関連
    Route::get('create'            , 'ArticleController@create')->name('create');
    Route::post('article/confirm'  , 'ArticleController@confirm')->name('confirm');
    Route::post('article/update'   , 'ArticleController@update')->name('update');
    Route::get('article/complete'  , 'ArticleController@complete')->name('complete');

    // 自分の投稿履歴表示
    Route::get('history'   , 'ArticleController@history')->name('history');
});

    //検索関連
    Route::get('search', 'ArticleController@search');
    Route::post('search', 'ArticleController@searchresult');

    Route::get('edit/{id}', 'ArticleController@edit');
    Route::post('edit', 'ArticleController@update');


    Route::get('report/{id}', 'ArticleController@edit_report');
    Route::post('update_report', 'ArticleController@report');

    Route::get('delete/{id}', 'ArticleController@show');
    Route::post('delete', 'ArticleController@delete');

    Route::get('page', 'ArticleController@index2')->middleware('auth');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/goutte', function() {
       $crawler = Goutte::request('GET', 'http://www.uplink.co.jp/movie-show/nowshowing');

       $crawler->filter('article.post h2 a')->each(function ($node) {
         echo $node->text();
         echo '<br/>';
       });
       return view('welcome');
    });
