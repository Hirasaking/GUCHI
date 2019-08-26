<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('ユーザID');
            $table->string('name', 30)->nullable()->comment('ユーザ名');
            $table->string('email', 30)->unique()->comment('メールアドレス');
            $table->string('password', 100)->comment('パスワード');
            $table->rememberToken();
            $table->timestamps();
        });
        
        DB::statement("ALTER TABLE users COMMENT 'ユーザマスター'");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
