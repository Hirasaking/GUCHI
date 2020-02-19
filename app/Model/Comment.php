<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // 投稿番号ごとにコメントを取得
    public function getComment(){
        $query = Comment::whereNull('deleted_at')
        ->whereNotIn('status', [0, 2]) //確認中・削除コメント除く
        ->select(
            'article_id',
            'body',
            'created_at'
            )
        ->get();

        return $query;
    }

}
