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
          'name'   => '大五郎',
          'age'   => '20',
          'sex'      => '1',
      ],
      [
          'name'   => 'ビッグジョン',
          'age'   => '30',
          'sex'      => '2',
      ],
      [
          'name'   => 'ポンポン丸',
          'age'   => '5',
          'sex'      => '1',
      ],
      [
          'name'   => 'こねこね',
          'age'   => '37',
          'sex'      => '2',
      ],
      [
          'name'   => 'ポンポン丸',
          'age'   => '5',
          'sex'      => '1',
      ],
      [
          'name'   => 'こねこね',
          'age'   => '37',
          'sex'      => '2',
      ],
      [
          'name'   => 'ポンポン丸',
          'age'   => '5',
          'sex'      => '1',
      ],
      [
          'name'   => 'こねこね',
          'age'   => '37',
          'sex'      => '2',
      ],
      [
          'name'   => 'ポンポン丸',
          'age'   => '5',
          'sex'      => '1',
      ],
      [
          'name'   => 'こねこね',
          'age'   => '37',
          'sex'      => '2',
      ],
    ]);
  }
}
