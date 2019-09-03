<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hand extends Model
{
    //
    protected $table = "hands";

    //Onn peux 
    public function players(){
        return $this->belongsToMany(Player::class);
    }

}
