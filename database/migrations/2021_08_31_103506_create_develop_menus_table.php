<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopMenusTable extends Migration
{
    protected $tableName = 'develop_navis';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->unsignedBigInteger('id')->comment('管理番号')->autoIncrement();
            $table->text('name')->comment('名前');
            $table->text('url')->comment('URL');
            $table->unsignedTinyInteger('status')->comment('ステータス');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
