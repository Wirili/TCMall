<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandTableSeeder extends Seeder
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
        for ($i = 1;$i <= 5;$i++ ) {
            $lists[]=[
                'brand_name'=>'品牌'.$i,
                'add_time'=> time()
            ];
        }
        foreach ($lists as $list) {
            Brand::create($list);
        }
    }
}
