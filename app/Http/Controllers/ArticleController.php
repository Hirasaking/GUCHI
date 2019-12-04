<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Article;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\UsersRequest;
use Carbon\Carbon;
use Validator;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        echo 'running index';
        // var_dump($request->session()->all());
        // var_dump($request->session()->all());
        $articles = (new Article)->getArticleList($request);
        // var_dump($articles);
        // flash session 延長
        // $request->session()->reflash();
        return view('article.index')->with('articles', $articles);
    }

    public function store(SearchRequest $request)
    {

        echo 'running store';
        session()->flash('select_sample', $request->input('select_sample'));
        // session()->flash('key_word1', $request->input('key_word1'));
        // session()->flash('checkbox1', $request->input('checkbox1'));
        // session()->flash('checkbox2', $request->input('checkbox2'));
        // session()->flash('checkbox3', $request->input('checkbox3'));

        // var_dump($request->input('key_word1'));exit;

        $articles = (new Article)->getArticleList($request);
        return view('article.index')->with('articles', $articles);
    }

    // 検索機能関連
    public function search(Request $request){
        return view('article.search');
    }

    // 検索結果
    public function searchresult(Request $request){
        $keyword = $request->keyword;

        $articles = Article::where('body', 'like', '%' . $keyword . '%')
                ->orWhere('job', 'like', '%' . $keyword . '%')
                ->get();
        $articles = Article::paginate(2);
        return view('article.result', compact('articles', 'keyword'));
    }

    // 投稿関連機能
    public function create(){
        // ユーザ情報の取得 今は使ってない
        $user = Auth::user();
        return view('article.create');
    }

    public function confirm(UsersRequest $request){

        // リクエストの内容を元にオブジェクト生成
        $article = new Article($request->all());

        $request->session()->regenerateToken();

        //セッションに追加
        //$request->session()->put('article', $article);

        return view('article.confirm', compact('article'));
    }

    //投稿内容の更新処理
    public function update(UsersRequest $request)
    {
        //リクエスト取得
        $contact = $request->all();

        //戻るボタンからの遷移
        if($request->action === 'back') {
            return redirect()->route('create')->withInput($contact);
            //return redirect()->route('create', compact('contact'));
        }

        //戻る以外なら保存処理準備
        $article = new Article($request->all());
        $request->session()->regenerateToken();

        //DBの更新
        $article->save();

        // //セッションから取得
        // $article = $request->session()->get('article');
        //
         return redirect('article/complete');
    }

    public function complete(Request $request)
    {
        //セッションから取得
        $article = $request->session()->get('article');
        return view('article.complete', compact('article'));
    }

    public function history()
    {
        // ユーザidの取得
        $user_id = Auth::id();

        // ユーザidから投稿内容の取得
        $articles = (new Article)->getArticleHistory($user_id);

        // 該当するデータが存在しない場合エラーを渡す
        if(empty($article) || $article == null){
          // 処理内容を追加する
          // バリデーションを追加
          $errors[] = "まだ投稿がありません。";

          return view('article.history', compact('articles', 'errors'));
        }

        return view('article.history')->with('articles', $articles);
    }

    public function edit(Request $request, $id){
        $article = Article::find($id);
        return view('article.edit',['article'=>$article]);
    }

    public function edit_report(Request $request, $id){
        $article = Article::find($id);
        return view('article.edit_report',['article'=>$article]);
    }

    public function report(Request $request){
        $article = Article::find($request->id);
        $article->report_count += 1;
        $article->save();
        return view('article.update');
    }

    public function show(Request $request, $id) {
        $article = Article::find($id);
        return view('article.show', ['article' => $article]);
    }

    public function delete(Request $request) {
        Article::destroy($request->id);
        return view('article.delete');
    }
}
