<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emotions', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->comment('投稿番号');
            $table->bigInteger('user_id')->comment('ユーザID');
            $table->tinyInteger('status')->default(0)->comment('ステータス 0:未登録 1:登録済 2:退会 3:BAN');
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
        Schema::dropIfExists('emotions');
    }
}
