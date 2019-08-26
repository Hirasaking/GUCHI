<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    public function getArticleList()
    {
        return Article::paginate(5);
    }
    
    public function getArticleRankList()
    {
        return Article::select(
                'id',
                'body',
                'updated_at'
                )
//                ->where('created_at', '>=', Carbon::now()->subDay(3))
                ->whereNull('deleted_at')
                ->get();
    }
}
