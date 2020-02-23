<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // 投稿番号ごとにコメントを取得
    /**
     * 
     * @return array $query
     */
    public function getComment($article_id_list){
        $comment_list = Comment::whereNull('deleted_at')
        ->whereIn('article_id', $article_id_list) //投稿IDの存在するコメントが対象
        // ->whereNotIn('status', [0, 2]) //確認中・削除コメント除く
        ->select(
            'article_id',
            'body',
            'created_at'
            )
        ->get();

        $data = []; // コメントデータを初期化
        foreach($comment_list as $key => $comment){
            // 投稿番号をキー、内容を要素に追加
            // 同じ投稿へのコメントはまとめる
            $data[$comment->article_id][] = $comment->body;
        }
        $query = collect($data);
        return $query;
    }

}
