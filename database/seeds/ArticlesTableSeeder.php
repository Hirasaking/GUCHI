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
                'category1'  => 1,
                'category2'  => 2,
                'category3'  => 3,
                'category4'  => 4,
                'status'    => 0,
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
            [
                'user_id'   => '2',
                'body'      => '投稿された本文2',
                'category1'  => 1,
                'category2'  => 2,
                'category3'  => 3,
                'category4'  => 4,
                'status'    => 0,
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
            [
                'user_id'   => '3',
                'body'      => '投稿された本文3',
                'category1'  => 1,
                'category2'  => 2,
                'category3'  => 3,
                'category4'  => 4,
                'status'    => 0,
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
        ]);
    }
}
