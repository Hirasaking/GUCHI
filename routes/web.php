<?php

Route::get('logout', 'ArticleController@index');

//BASIC認証
Route::group(['middleware' => 'auth.very_basic'], function() {

    Route::get('/', 'ArticleController@index');
    Route::get('rank', 'ArticleController@rank');

    Route::get('post_history', 'ArticleController@post_history')->middleware('auth');

    //新規投稿部分
    Route::get ('create'            , 'ArticleController@create');
    Route::post('article/confirm'   , 'ArticleController@confirm');
    Route::post('article/update'    , 'ArticleController@update');
    Route::get ('article/complete'  , 'ArticleController@complete');

    Route::get('edit/{id}', 'ArticleController@edit');
    Route::post('edit', 'ArticleController@update');

    Route::get('search', 'ArticleController@search');
    Route::get('result', 'ArticleController@result');

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
});
