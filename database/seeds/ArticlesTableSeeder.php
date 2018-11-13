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
            'body'      => '投稿された本文１',
            'category'  => 'company',
        ],
        [
            'user_id'   => '2',
            'body'      => '投稿された本文',
            'category'  => 'shop',
        ],
        [
            'user_id'   => '3',
            'body'      => '投稿された本文',
            'category'  => 'school',
        ],
      ]);
    }
}
