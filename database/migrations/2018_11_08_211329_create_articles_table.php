<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('投稿ID');
            $table->Integer('user_id')->unsigned()->comment('ユーザID');
            $table->string('body', 255)->comment('本文');
            $table->string('category', 30)->nullable()->comment('投稿カテゴリー');
            $table->timestamps();
            $table->softDeletesTz()->comment('削除日時');
            
//            $table->foreign('user_id')->references('user_id')
//                    ->on('users')->onDelete('cascade');
        });
        
        DB::statement("ALTER TABLE articles COMMENT '投稿マスター'");

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
