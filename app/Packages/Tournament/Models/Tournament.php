<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{

    /**
     * The players that belong to the tournament.
     */
    public function players()
    {
        return $this->belongsToMany(Player::class)
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
     * Get the summary.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function summary() {
        return $this->hasOne(TournamentSummarie::class);
    }
}
