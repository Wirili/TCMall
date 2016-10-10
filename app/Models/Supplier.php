<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $primaryKey="suppliers_id";
    public $timestamps=false;

    public function goods(){
        return $this->hasMany(Good::class,'suppliers_id','suppliers_id');
    }
}
