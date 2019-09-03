<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    protected $table = "players";

    public function hands(){
        return $this->belongsToMany(Hand::class);
    }
}
