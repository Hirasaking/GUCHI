<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete(); //最初に全件削除
        
        DB::table('users')->insert([
        [
            'status' => '0',
            'created_at' => '2020-02-20 00:00:00',
            'updated_at' => '2020-02-20 00:00:00',
        ],
        [
            'status' => '0',
            'created_at' => '2020-02-20 00:00:00',
            'updated_at' => '2020-02-20 00:00:00',
        ],
        [
            'status' => '0',
            'created_at' => '2020-02-20 00:00:00',
            'updated_at' => '2020-02-20 00:00:00',
        ]
      ]);
    }
}
