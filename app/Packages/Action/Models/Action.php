<?php

namespace App\Packages\Action\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    /**
     * Round
     */
    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    /**
     * Player
     */
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
