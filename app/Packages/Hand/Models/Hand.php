<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hand extends Model
{
    //
    /**
     * @var false|string
     */
    public $date;

    /**
     * Get the players.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function players()
    {
        return $this->belongsToMany(Player::class)
            ->withPivot([
                'seat',
                'stack'
            ])
            ->withTimestamps();
    }

    public function cards()
    {
        return $this->belongsToMany(Card::class);
    }

    public function rounds()
    {
        return $this->hasMany(Round::class);
    }
}
