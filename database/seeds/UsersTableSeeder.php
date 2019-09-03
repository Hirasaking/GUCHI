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
            'name' => 'user1',
            'email'     => 'test_user1@gmail.com',
            'password'  => 'test_user1',
        ],
        [
            'name' => 'user1',
            'email'     => 'test_user2@gmail.com',
            'password'  => 'test_user2',
        ],
        [
            'name' => 'user1',
            'email'     => 'test_user3@gmail.com',
            'password'  => 'test_user3',
        ],
      ]);
    }
}
