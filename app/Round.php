<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    //
    public function cards()
    {
        return $this->belongsToMany(Card::class);
    }

    public function hand()
    {
        return $this->belongsTo(Round::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }
}
