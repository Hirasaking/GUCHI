<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table_name = 'comments';

        DB::table($table_name)->delete(); //最初に全件削除

        DB::table($table_name)->insert([
            [
                'article_id' => 1,
                'body'       => 'コメントされた文章1',
                'status'    => 0,
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
            [
                'article_id' => 2,
                'body'       => 'コメントされた文章2',
                'status'    => 0,
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
            [
                'article_id' => 2,
                'body'       => 'コメントされた文章3',
                'status'    => 0,
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
            [
                'article_id' => 99,
                'body'       => '存在しない投稿IDのコメント',
                'status'    => 0,
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
            [
                'article_id' => 2,
                'body'       => '存在しない投稿IDのコメント',
                'status'    => 1,
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
        ]);
    }
}
