<?php

use Illuminate\Database\Seeder;

class UserInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_infos')->delete(); //最初に全件削除

        DB::table('user_infos')->insert([
            [
                'user_id'   => 1,
                'user_name' => '東京太郎',
                'email'     => 'sample1@exsample.com',
                'login_service' => 0,
                'pass_word' => Hash::make('test1'),
                'gender'    => 1,
                'job'       => '大学生',
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
            [
                'user_id'   => 2,
                'user_name' => '千葉太郎',
                'email'     => 'sample2@exsample.com',
                'login_service' => 0,
                'pass_word' => Hash::make('test1'),
                'gender'    => 1,
                'job'       => '中堅サラリーマン',
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
            [
                'user_id'   => 3,
                'user_name' => '神奈川太郎',
                'email'     => 'sample3@exsample.com',
                'login_service' => 0,
                'pass_word' => Hash::make('test1'),
                'gender'    => 1,
                'job'       => '主夫',
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
        ]);
    }
}
