<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 開発用メニュー
        $this->call(DevelopMenuTableSeeder::class);

        // $this->call(UsersTableSeeder::class);
        // $this->call(UserInfosTableSeeder::class);

        $this->call(SalesTableSeeder::class);
        // $this->call(PurchaseTableSeeder::class);
        // $this->call(ItemsTableSeeder::class);
        // $this->call(ArticlesTableSeeder::class);
        // $this->call(CommentsTableSeeder::class);
    }
}
