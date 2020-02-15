<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete(); //最初に全件削除

        DB::table('items')->insert([
            [
                'name'       => 'こねこね',
                'age'        => '37',
                'sex'        => '2',
                'memo'       => 'テキスト',
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
            [
                'name'   => 'ぽんぽんまる',
                'age'   => '5',
                'sex'      => '1',
                'memo'       => 'テキスト',
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
            [
                'name'   => 'ふわふわまる',
                'age'   => '20',
                'sex'      => '2',
                'memo'       => 'テキスト',
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',
            ],
        ]);
    }
}
