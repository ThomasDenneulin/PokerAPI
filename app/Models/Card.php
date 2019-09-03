<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $table = "cards";

    protected $fillable = ["value","color"];
    //Recupere le round de la carte
    public function rounds(){
        return $this->belongsToMany(Round::class);
    }
}
