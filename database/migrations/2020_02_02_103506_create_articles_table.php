<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->comment('管理番号');
            $table->bigInteger('user_id')->comment('ユーザID');
            $table->text('body')->comment('本文');
            $table->tinyInteger('category1')->comment('カテゴリ1');
            $table->tinyInteger('category2')->comment('カテゴリ2');
            $table->tinyInteger('category3')->comment('カテゴリ3');
            $table->tinyInteger('category4')->comment('カテゴリ4');
            $table->tinyInteger('status')->default(0)->comment('ステータス 0:未登録 1:登録済 2:退会 3:BAN');
            $table->timestamps();
            $table->softDeletes()->comment('論理削除日時');

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
