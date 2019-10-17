<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //

    protected $fillable = [
        'value',
        'color'
    ];

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }

    public function rounds()
    {
        return $this->belongsToMany(Round::class);
    }
}
