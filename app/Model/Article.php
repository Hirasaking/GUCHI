<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{

    protected $fillable = ['job', 'body'];

    public function getArticleList()
    {
        return Article::paginate(3);
    }

    public function getArticleRankList()
    {
        return Article::select(
                'id',
                'body',
                'created_at'
                )
//                ->where('created_at', '>=', Carbon::now()->subDay(3))
                ->whereNull('deleted_at')
                ->get();
    }

    // ユーザが投稿した内容を取得
    // @param  $user_id ユーザID
    // @return article  該当ユーザが投稿した一覧
    public function getArticleHistory(int $user_id)
    {
      // ユーザIDが存在しない場合のチェック必要

       $article = Article::select(
                'id',
                'body',
                'created_at'
                )
                ->where('user_id', $user_id)
                ->get()->toArray();

                return $article;
    }
}
