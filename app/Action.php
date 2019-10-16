<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    //
    public function round()
    {
        $this->hasOne(Round::class, 'round_id');
    }

    public function player()
    {
        $this->hasOne(Player::class, 'player_id');
    }
}
