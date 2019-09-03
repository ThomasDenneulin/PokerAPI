<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hand extends Model
{
    //
    protected $table = "hands";

    //Onn peux 
    public function players(){
        return $this->hasMany('\Models\Player','hand_id','id');
    }

    public function rounds(){
        return $this->hasMany('\Models\Round','hand_id','id');
    }

}
