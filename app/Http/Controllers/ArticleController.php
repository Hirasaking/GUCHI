<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Comment;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{

    public function __construct(){
        $this->article = new Article();
        $this->comment = new Comment();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_list = [];
        // 投稿内容を取得
        $article_list = $this->article->getArticles();
        $article_id_list = $this->article->getArticleId($article_list);
        // 投稿IDからコメントを取得
        $comment_list = $this->comment->getComment($article_id_list);
        // データをページャへ渡す形に整形
        $data_list = $this->article->adjustData($article_list, $comment_list);

        return view('article.index')->with('data_list', $data_list);
    }

    /**
     * 登録画面の表示
     *
     * @param  Request $request
     * @return Response
     */
    public function create(Request $request){
        return view('article.create');
    }

  /**
   * 登録処理
   *
   * @param  ArticleRequest  $request
   * @return Response
  */
  public function store(ArticleRequest $request){
    $article = $this->article;
    $article->user_id = 1; //$request->name;
    $article->body = $request->body;
    $article->save();
    return redirect()->action('ArticleController@index');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
