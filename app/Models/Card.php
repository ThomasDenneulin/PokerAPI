<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $table = "cards";

    //Recupere le round de la carte
    public function rounds(){
        return $this->belongsToMany(Round::class);
    }
}
