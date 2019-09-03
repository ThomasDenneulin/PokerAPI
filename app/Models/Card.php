<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $table = "cards";

    //Recupere le round de la carte
    public function round(){
        $this->belongsTo('\Models\Round','card_id','id');
    }
}
