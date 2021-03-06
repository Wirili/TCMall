<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $primaryKey='cat_id';
    public $timestamps=false;

    public function children(){
        return $this->hasMany(Category::class,'parent_id','cat_id');
    }

    public function goods(){
        return $this->hasMany(Good::class,'cat_id','cat_id');
    }

    /**
     * 递归获取商品分类
     * @param int $parent_id
     * @param int $level
     * @param array $list
     * @return array
     */
    public static function getCatList($parent_id,$level = 0,&$list=[]){
        $cat=self::where('parent_id',$parent_id)->orderBy('sort_order')->get();
        foreach ($cat as $item) {
            $itemArr = $item->toArray();
            $itemArr['level']=$level;
            $list[]=$itemArr;
            if (!$item->children->isEmpty()) {
                self::getCatList($item->cat_id,$level+1,$list);
            }
        }
        return $list;
    }
}
