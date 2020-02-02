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
            'email'     => 'test_user01@gmail.com',
            'password'  => 'test_user01',
            'password' => Hash::make('test_user01'), // この場合、「my_secure_password」でログインできる        ],
        ],
        [
            'name' => 'user1',
            'email'     => 'test_user02@gmail.com',
            'password' => Hash::make('test_user02'),
        ],
        [
            'name' => 'user1',
            'email'     => 'test_user03@gmail.com',
            'password' => Hash::make('test_user03'),
        ]
      ]);
    }
}
