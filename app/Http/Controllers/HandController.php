<?php

namespace App\Http\Controllers;

use App\Action;
use App\Card;
use App\Hand;
use App\Player;
use App\Round;
use Illuminate\Http\Request;


class HandController extends Controller
{
    //
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->all();
        foreach ($data as $hand) {
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
                $newRound->save();
                foreach ($round['cards'] as $card) {
                    $newCard = Card::firstOrCreate(
                        [
                            'value' => $card['value'],
                            'color' => $card['color']
                        ]
                    );
                    $newRound->cards()->save($newCard);

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
                    $newAction['player_id'] = $playerAction['id'];
                    $newAction['round_id'] = $newRound['id'];
                    $newAction->save();
                }
            }
        };

        dd('down');
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
