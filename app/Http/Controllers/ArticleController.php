<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();
        $articles = Article::paginate(5);
        return view('article.index',['articles'=>$articles]);
    }

    public function rank(){
        $articles = Article::where('report_count','<',10)
                ->where('category','normal')
                ->where('delete_flag',0)
                ->orderBy('like_count','desc')
                ->take(3)
                ->get();
        return view('article.rank',['articles'=>$articles]);
    }

    public function post_history(){
        $user = Auth::user();
        $articles = Article::where('user_id',$user->id)->get();
        return view('article.post_history',['articles'=>$articles, 'user'=>$user]);
    }
    
    public function index2(Request $request){
        $user = Auth::user();
        $sort = $request->sort;
        $articles = Article::paginate(10);
        return view('page.index',['articles'=>$articles, 'user'=>$user]);
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
        return view('article.create',['user'=>$user]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'job' => 'required|max:60',
            'body' => 'required',
            ]);
        
        $article = new Article;
        $article->job = $request->job;
        $article->body = $request->body;
        $article->user_id = $request->user_id;
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
