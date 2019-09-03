<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete(); //最初に全件削除
        
        DB::table('articles')->insert([
        [
            'user_id'   => '1',
            'job'   => '学生',
            'body'      => '投稿された本文１',
        ],
        [
            'user_id'   => '2',
            'job'   => 'サラリーマン',
            'body'      => '投稿された本文',
        ],
        [
            'user_id'   => '3',
            'job'   => 'やさっぐれ主婦',
            'body'      => '投稿された本文',
        ],
      ]);
    }
}
