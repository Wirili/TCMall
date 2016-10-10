<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    //
    protected $primaryKey="goods_id";
    protected $appends = ['add_time_format'];
    public $timestamps=false;

    public function getAddTimeFormatAttribute()
    {
        return date('Y-m-d',$this->attributes['add_time']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gallery(){
        return $this->hasMany(GoodGallery::class,'goods_id','goods_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cover(){
        return $this->hasOne(GoodGallery::class,'img_id','img_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supplier(){
        return $this->hasOne(Supplier::class,'suppliers_id','suppliers_id');
    }
}
