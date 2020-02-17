<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{

    public function __construct(){
        $this->article = new Article();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = new Article();
        $article_list = $articles->getArticles();
        // var_dump($data);exit;
        // foreach($article_list as $data){
        //     var_dump($data);exit;
        // }
        return view('article.index')->with('article_list', $article_list);
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
