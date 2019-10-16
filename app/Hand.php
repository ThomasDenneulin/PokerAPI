<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hand extends Model
{
    //
    public function players()
    {
        return $this->belongsToMany(Player::class, 'hand_player');
    }

    public function cards()
    {
        return $this->belongsToMany(Card::class, 'round');
    }
}
