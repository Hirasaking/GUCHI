<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function getArticleList()
    {
        //master, admin
        return Article::paginate(5);
        
        //user
        
    }
}
