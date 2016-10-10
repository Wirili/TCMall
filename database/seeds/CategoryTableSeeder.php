<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
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
        for($i=1;$i<=5;$i++)
        {
            if($i<=2) {
                $lists[] = [
                    'cat_name' => '类别' . $i,
                ];
            }
            else{
                $lists[] = [
                    'cat_name' => '类别' . $i,
                    'parent_id'=>rand(1,2)
                ];
            }
        }
        foreach ($lists as $list) {
            Category::create($list);
        }
    }
}
