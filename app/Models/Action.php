<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    //
    protected $table = "actions";

    //Recupere le Round de cette action
    public function round(){
        $this->belongsTo('\Models\Round','action_id','id');
    }
}
