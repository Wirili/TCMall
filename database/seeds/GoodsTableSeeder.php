<?php

use Illuminate\Database\Seeder;
use App\Models\Good;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $lists=[];
        for ( $i=1;$i<=100;$i++) {
            $lists[]=[
                'goods_sn'=>'TC'.$i,
                'goods_name'=>'商品'.$i,
                'brand_id'=>rand(1,5),
                'suppliers_id'=>rand(1,5),
                'add_time'=> time(),
                'cat_id'=>rand(1,5)
            ];
        }
        foreach ($lists as $list) {
            Good::create($list);
        }
    }
}
