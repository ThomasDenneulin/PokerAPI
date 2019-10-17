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

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }

    public function cards()
    {
        return $this->belongsToMany(Card::class, 'round');
    }
}
