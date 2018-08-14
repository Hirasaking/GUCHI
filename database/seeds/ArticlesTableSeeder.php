<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 15;$i++) {
            $article = new Article;
            $article->body = '記事本文' . $i;
            $article->like_count = $i;
            $article->report_count = 0;
            $article->save();
        }
    }
}