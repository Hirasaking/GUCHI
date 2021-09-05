<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    public function run()
    {

        $data = [];
        // 適当な１０の販売データ
        for($i=1;$i<=30;$i++){
            $data[] = [
                'order_date'   => '2020-02-20 00:00:00',
                'order_id'     => $i,
                'platform'  => random_int(1,5),
                'product_name'  => '商品:No' . $i,
                'quantity'  => random_int(1,3),
                'sales_price'  => 10000,
                'fee_rate'    => 10,
                'fee'    => 1000,
                'delivery_cost'    => 1000,
                'sales_income'    => 8000,
                'purchase_cost'    => 6000,
                'net_income'    => 2000,
                'collect_point'    => random_int(0,100),
                'collect_point_kind'    => random_int(1,5),
                'status'    => random_int(0,2),
                'delete_flg'    => 0,
                'created_at' => '2020-02-20 00:00:00',
                'updated_at' => '2020-02-20 00:00:00',

            ]; 
        }
        DB::table('sales')->delete(); //最初にdrop Table
        
        DB::table('sales')->insert($data);
    }
}
