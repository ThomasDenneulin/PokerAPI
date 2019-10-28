<?php


namespace App\PokersRules;


use App\Http\Resources\PlayerResource;
use App\Http\Resources\RoundResource;

class Round
{

    /**
     * Get the winner of the round.
     */
    public static function winner(RoundResource $round): PlayerResource
    {
        foreach ($round as $action) {

        }
    }
}
