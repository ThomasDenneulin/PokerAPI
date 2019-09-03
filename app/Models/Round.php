<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    //
    protected $table = 'rounds';

    public function cards(){
        return $this->belongsToMany(Card::class);
    }
}
