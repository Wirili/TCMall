<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class GoodGallery extends Model
{
    //
    protected $primaryKey='img_id';
    protected $table='goods_gallery';
    public $timestamps=false;

    public function goods(){
        return $this->hasMany(Good::class,'goods_id','goods_id');
    }
}
