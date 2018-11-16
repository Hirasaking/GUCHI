<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Article;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = (new Article)->getArticleList();
        return view('article.index')->with('articles', $articles);
    }

    public function rank()
    {
        $articles = (new Article)->getArticleRankList();
        return view('article.rank',['articles'=>$articles]);
    }
    
    public function search(){
        return view('article.search');
    }

    public function result(Request $request){
        $keyword = $request->keyword;
        $articles = Article::where('body', 'like', '%' . $keyword . '%')
                ->orWhere('job', 'like', '%' . $keyword . '%')
                ->get();
        $data = Article::paginate(10);
        return view('article.result',['articles'=>$articles]);
    }
    
    public function create(){
        $user = Auth::user();
        return view('article.create')->with('user', $user);
    }
    
    public function store(Request $request)
    {
        $article = new Article;
        $article->body = $request->body;
        $article->user_id = Auth::user()->id;
        $article->save();
        
        return view('article.store');
    }
    
    public function edit(Request $request, $id){
        $article = Article::find($id);
        return view('article.edit',['article'=>$article]);
    }

    public function edit_report(Request $request, $id){
        $article = Article::find($id);
        return view('article.edit_report',['article'=>$article]);
    }
    
    public function update(Request $request){
        $article = Article::find($request->id);
        $article->like_count += 1;
        $article->save();
        return view('article.update');
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
