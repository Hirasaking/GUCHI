<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // 一覧表示に使用する投稿データ取得
    public function getArticles(){

        $query = Article::whereNull('articles.deleted_at')
            ->select(
                'articles.id',
                'articles.body',
                'articles.category1',
                'articles.category2',
                'articles.category3',
                'articles.category4',
                'articles.status',
                'articles.created_at',
                'user_infos.user_name',
                'user_infos.gender',
                'user_infos.job',
                'comments.body as comment'
                )
            ->join('users', 'users.user_id', '=', 'articles.user_id')
            ->join('user_infos', 'user_infos.user_id', '=', 'users.user_id')
            ->join('comments', 'comments.article_id', '=', 'articles.id')
            ->paginate(20);
            // ->get();

        return $query;
    }
}