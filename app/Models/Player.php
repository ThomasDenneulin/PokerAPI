<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    protected $table = "players";

    protected $fillable = ["name","seat"];

    public function hands(){
        return $this->belongsToMany(Hand::class);
    }
}
