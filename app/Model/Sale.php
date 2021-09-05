<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Sale extends Model
{
    


    /**
     * 販売リストを取得
     * 表示可能なリストに絞り込む
     * @return collection
     */
    public function getIndexSaleList(){

        $status = config('const.STATUS.SHOW');
        // 表示可能なリストに絞り込む

        return self::where('status', $status)->orderBy('order_date', 'asc');
    }

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
                'user_infos.user_name'
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

    /**
     * データを整形してページャ用にして返す
     * @param Article $article_list
     * @param array $comment_list
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function adjustData($article_list, $comment_list){
        // 処理追加
        foreach($article_list as $key => $article){
            $data_list[$key]['id'] = $article->id;
            $data_list[$key]['body'] = $article->body;
            $data_list[$key]['category1'] = $article->category1;
            $data_list[$key]['category2'] = $article->category2;
            $data_list[$key]['category3'] = $article->category3;
            $data_list[$key]['category4'] = $article->category4;
            $data_list[$key]['status'] = $article->status;
            $data_list[$key]['created_at'] = $article->created_at;
            $data_list[$key]['user_name'] = $article->user_name;

            //コメントがあるなら追加
            // if(in_array($comment_list, $article->id)){
            $data_list[$key]['comment'] = $comment_list->get($article->id);
            // }
        }

        return new LengthAwarePaginator(
            $data_list,
            20,
            5,
            1
        );
    }
}