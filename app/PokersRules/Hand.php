<?php


namespace App\PokersRules;


use App\Player;
use phpDocumentor\Reflection\Types\Integer;

class Hand
{
    /**
     * Get the stack won by a player
     *
     * @param Player $player
     * @param \App\Hand $hand
     * @return int
     */
    public static function getStackWon(
        Player $player,
        \App\Hand $hand
    ): Integer {

    }
}
