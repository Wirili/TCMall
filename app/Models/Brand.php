<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $primaryKey="brand_id";
    protected $appends = ['add_time_format'];
    public $timestamps=false;

    public function goods(){
        return $this->hasMany(Good::class,'brand_id','brand_id');
    }

    public function getAddTimeFormatAttribute()
    {
        return date('Y-m-d',$this->attributes['add_time']);
    }
}
