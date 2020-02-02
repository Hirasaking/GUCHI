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
            $table->unsignedBigInteger('id');
            $table->text('body')->comment('本文');
            $table->tinyInteger('status')->default(0)->comment('ステータス 0:内容確認中 1:表示 2:不適切なため非表示');
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
        Schema::dropIfExists('comments');
    }
}
