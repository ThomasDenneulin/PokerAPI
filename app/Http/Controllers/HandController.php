<?php

namespace App\Http\Controllers;

use App\Action;
use App\Card;
use App\Hand;
use App\Http\Resources\HandCollection;
use App\Player;
use App\Round;
use Illuminate\Http\Request;

/**
 * Class HandController
 * @package App\Http\Controllers
 */
class HandController extends Controller
{
    /**
     * Get hands from database
     *
     * @param Request $request
     */
    public function index(Request $request): HandCollection
    {
        //
        $data = $request->all();

        return (new HandCollection(Hand::with(
            [
                'players',
                'rounds',
                'rounds.actions',
                'rounds.cards'
            ])
            ->get())
        );
    }

    /**
     * Store Hands in database.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $data = $request->all();
        foreach ($data['hands'] as $hand) {
            $newHand = new Hand();
            $newHand['date'] = date('d-m-y');
            $newHand['gameType'] = 'aaaaa';
            $newHand['isRealMoney'] = true;

            foreach ($hand['players'] as $player) {
                $newPlayer = Player::firstOrCreate(['name' => $player['name']]);
                $newPlayer->hands()->save($newHand, [
                    'seat' => $player['seat'],
                    'stack' => 0
                ]);
            }

            foreach ($hand['rounds'] as $round) {
                $newRound = new Round();

                $newRound->hand()
                    ->associate($newHand);
                $newRound->save();
                foreach ($round['cards'] as $card) {
                    $newCard = Card::firstOrCreate(
                        [
                            'value' => $card['value'],
                            'color' => $card['color']
                        ]
                    );
                    $newCard->rounds()
                        ->attach($newRound);
                }
                foreach ($round['actions'] as $action) {
                    $newAction = new Action();
                    $newAction['type'] = $action['type'];
                    $playerAction = Player::where(['name' => $action['player']['name']])
                        ->get()
                        ->first();
                    if (isset($action['properties']['value'])) {
                        $newAction['value'] = $action['properties']['value'];
                    } else {
                        $newAction['value'] = null;
                    }
                    $newAction->player()
                        ->associate($playerAction);
                    $newAction->round()
                        ->associate($newRound);
                    $newAction->save();
                }
            }
        };

        dd("Done");
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    /**
     * Get the streak bankroll from a player.
     *
     * @param Request $request
     * @param Player $player
     */
    public function getStreak(
        Request $request,
        Player $player
    ) {
        $data = $request->all();
        $builder = Hand::query();
    }
}
