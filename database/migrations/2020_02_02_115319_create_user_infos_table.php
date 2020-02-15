<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->BigInteger('user_id')->comment('ユーザID');
            $table->string('user_name',20)->comment('アカウント名');
            $table->string('email',50)->comment('メールアドレス');
            $table->string('login_service',50)->comment('ログイン連携サービス');
            $table->string('pass_word',50)->comment('パスワード');
            $table->tinyInteger('gender')->default(0)->comment('0:なし 1:男 2:女');
            $table->string('job',20)->comment('職業');
            $table->timestamps();
            $table->softDeletes()->comment('論理削除日時');

            $table->primary('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
