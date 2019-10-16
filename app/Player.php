<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    protected $table = "players";

    protected $fillable = ["name"];

    /**
     * The cards possessed by the player.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cards()
    {
        return $this->belongsToMany(Card::class, 'hand_player');
    }
}


