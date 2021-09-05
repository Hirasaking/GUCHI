<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopMenusTable extends Migration
{
    protected $tableName = 'purchases';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // テーブルが存在しなければマイグレーション実行
        if(Schema::hasTable($this->tableName)){
            Schema::create($this->tableName, function (Blueprint $table) {
                $table->unsignedBigInteger('purchase_id', 10)->comment('管理番号')->autoIncrement();
                $table->date('purchase_date')->comment('購入日');
                $table->string('product_name', 128)->comment('商品名');
                $table->unsignedInteger('purchase_quantity', 5)->comment('数量');
                $table->unsignedInteger('purchase_price', 10)->comment('金額');
                $table->unsignedInteger('total_price', 10)->comment('合計額');
                $table->unsignedTinyInteger('status', 1)->comment('ステータス');
                $table->date('return_limit')->comment('キャンセル可能日');
                $table->text('memo')->comment('メモ');
                $table->timestamps();
            });
        }
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
