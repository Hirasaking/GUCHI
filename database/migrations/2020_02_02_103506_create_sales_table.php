<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_id')->comment('管理番号')->autoIncrement();
            $table->date('order_date')->comment('注文日');
            $table->unsignedBigInteger('order_id')->comment('注文番号');
            $table->unsignedTinyInteger('platform')->comment('販売先');
            $table->text('product_name')->comment('商品名');
            $table->unsignedInteger('quantity')->comment('数量');
            $table->text('sales_price')->comment('販売価格');
            $table->unsignedTinyInteger('fee_rate')->nullable()->comment('手数料率'); // 計算結果で出せない場合あるためNULL許可
            $table->unsignedbigInteger('fee')->nullable()->comment('消費税'); // 計算結果で出せない場合あるためNULL許可
            $table->unsignedbigInteger('delivery_cost')->nullable()->comment('配送費用'); // 後から入力するのでNULL許可
            $table->bigInteger('sales_income')->comment('売上');
            $table->unsignedbigInteger('purchase_cost')->comment('仕入費用');
            $table->unsignedbigInteger('net_income')->comment('利益');
            $table->unsignedbigInteger('collect_point')->comment('獲得ポイント');
            $table->unsignedTinyInteger('collect_point_kind')->comment('獲得ポイント種類');
            $table->unsignedTinyInteger('status')->comment('ステータス');
            $table->boolean('delete_flg')->default(0)->comment('論理削除');
            $table->timestamps();

            // 外部キー制約
            // $table->foreign('user_id')
            //         ->references('user_id')
            //         ->on('users')
            //         ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
