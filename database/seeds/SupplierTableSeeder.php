<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierTableSeeder extends Seeder
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
                'suppliers_name'=>'供货商'.$i,
                'suppliers_desc'=>'供货商描述'.$i
            ];
        }
        foreach ($lists as $list) {
            Supplier::create($list);
        }
    }
}
