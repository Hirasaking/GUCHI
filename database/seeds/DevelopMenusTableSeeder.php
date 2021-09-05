<?php

use Illuminate\Database\Seeder;

class DevelopMenuTableSeeder extends Seeder
{
    protected $tableName = 'develop_navis';

    public function run()
    {
        $data[] = [
            'name'     => 'phpmyadmin',
            'url'  => 'http://localhost:3000/',
            'status'    => 0,
            'created_at' => '2020-02-20 00:00:00',
            'updated_at' => '2020-02-20 00:00:00',

        ];
        $data[] = [
            'name'     => 'command',
            'url'  => '/develop/command',
            'status'    => 0,
            'created_at' => '2020-02-20 00:00:00',
            'updated_at' => '2020-02-20 00:00:00',

        ];
        DB::table($this->tableName)->delete(); //最初にdrop Table

        DB::table($this->tableName)->insert($data);
    }
}
