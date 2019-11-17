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
        return $this->belongsToMany(Card::class);
    }

    public function hands()
    {
        return $this->belongsToMany(Hand::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}


