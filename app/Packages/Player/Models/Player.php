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

    /**
     * Hands played.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hands()
    {
        return $this->belongsToMany(Hand::class)
            ->withPivot([
                'seat',
                'stack'
            ])
            ->withTimestamps();
    }

    /**
     * Actions done.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actions()
    {
        return $this->hasMany(Action::class);
    }

    /**
     * The user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * The tournaments that belong to the player.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class)
            ->has('tournament_summaries')
            ->using(TournamentSummarie::class)
            ->withPivot([
                'buy_in',
                'registered_players',
                'prize_pool',
                'time_played',
                'rank',
                'money_won'
            ])
            ->withTimestamps();
    }

    /**
     * The rounds for hands
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function rounds() {
        return $this->hasManyThrough(Round::class,Hand::class);
    }
}


