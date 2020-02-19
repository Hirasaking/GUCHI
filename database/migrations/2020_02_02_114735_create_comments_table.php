<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('id')->autoIncrement()->comment('管理番号');
            $table->unsignedBigInteger('article_id')->comment('投稿番号');
            $table->text('body')->comment('本文');
            $table->tinyInteger('status')->default(0)->comment('ステータス 0:内容確認中 1:表示 2:不適切なため非表示');
            $table->timestamps();
            $table->softDeletes()->comment('論理削除日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
