<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    // 今はブラックリスト形式のほうが良さそう
    //protected $fillable = [];
    protected $guarded = ['id', 'body'];

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
                'user_infos.job'
                )
            ->join('users', 'users.user_id', '=', 'articles.user_id')
            ->join('user_infos', 'user_infos.user_id', '=', 'users.user_id')
            ->paginate(20);

        return $query;
    }

    /**
     * 有効な投稿の投稿番号を取得
     *
     * @return array
     */
    public function getArticleId($article_list){
        //
        foreach($article_list as $data){
            $article_id_list[] = $data->id;
        }

        return $article_id_list;
    }
}