<?php

use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
    public function run()
    {

        $data = [];
        // 適当な１０の販売データ
        for($i=1;$i<=30;$i++){
            $qty = random_int(1,10);
            $price = 1000;
            $total_price = $qty * $price;

            $data[] = [
                'purchase_id'     => $i,
                'purchase_date' => '2020-02-20 00:00:00',
                'product_name'  => '商品:No' . $i,
                'purchase_quantity'  => $qty,
                'purchase_price'  => $price,
                'total_price'  => $total_price,
                'status'    => random_int(0,5),
                'return_limit' => '2020-02-20 00:00:00',
                'memo'  => '@@@@@@@@@@@@@@',
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',

            ];
        }
        DB::table('sales')->delete(); //最初にdrop Table
        DB::table('sales')->insert($data);
    }
}
