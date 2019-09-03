<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hand;
use App\Models\Player;
use App\Models\Round;
use App\Models\Card;
use App\Models\Action;
use App\Models\ActionType;

class HandController extends Controller
{
    //
    public function index()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
        //$tmp = [{"id":"1259530336719601665-1-1566556898","date":"2019-08-23T10:41:38.000Z","players":[{"name":"brybry_32","seat":1},{"name":"Arthur.borso","seat":2},{"name":"FERRARI 07","seat":3},{"name":"enzo6410000","seat":4},{"name":"TotoNaBendo","seat":5},{"name":"Blancheur137","seat":6}],"buttonSeat":5,"rounds":[{"cards":[],"actions":[{"player":{"name":"Blancheur137","seat":6},"type":1,"properties":{"value":10}},{"player":{"name":"brybry_32","seat":1},"type":2,"properties":{"value":20}}]},{"cards":[],"actions":[{"player":{"name":"Arthur.borso","seat":2},"type":7,"properties":{}},{"player":{"name":"FERRARI 07","seat":3},"type":4,"properties":{"value":20}},{"player":{"name":"enzo6410000","seat":4},"type":7,"properties":{}},{"player":{"name":"TotoNaBendo","seat":5},"type":7,"properties":{}},{"player":{"name":"Blancheur137","seat":6},"type":6,"properties":{"value":480,"total":500}},{"player":{"name":"brybry_32","seat":1},"type":7,"properties":{}},{"player":{"name":"FERRARI 07","seat":3},"type":4,"properties":{"value":480}}]},{"cards":[{"value":"A","color":"d"},{"value":"5","color":"c"},{"value":"K","color":"c"}],"actions":[]},{"cards":[{"value":"A","color":"d"},{"value":"5","color":"c"},{"value":"K","color":"c"},{"value":"4","color":"c"}],"actions":[]},{"cards":[{"value":"A","color":"d"},{"value":"5","color":"c"},{"value":"K","color":"c"},{"value":"4","color":"c"},{"value":"Q","color":"h"}],"actions":[]},{"cards":[],"actions":[{"player":{"name":"Blancheur137","seat":6},"type":8,"properties":{"cards":[{"value":"3","color":"h"},{"value":"J","color":"c"}]}},{"player":{"name":"FERRARI 07","seat":3},"type":8,"properties":{"cards":[{"value":"K","color":"h"},{"value":"6","color":"h"}]}},{"player":{"name":"FERRARI 07","seat":3},"type":9,"properties":{"value":1020}}]}]}];


        echo var_dump($request->input('players'));
        $hand_tmp = new Hand;
        $hand_tmp->date = \Carbon\Carbon::parse($request->input('date'))->format('Y-m-d h:m:s');
        $hand_tmp->buttonSeat = $request->input('buttonSeat');
        $hand_tmp->save();
        //$hand_tmp->id = $request->input('id') - 100000000000000000;
        

        foreach($request->input('players') as $player){
            $tmp_player = Player::firstOrCreate($player);
            $hand_tmp->players()->attach($tmp_player->id);
        }

        foreach($request->input('rounds') as $round){
            $tmp_round = new Round;
            $tmp_round->save();
            var_dump($request->input('rounds.*.cards'));
            if(count($request->input('rounds.*.cards')) > 0) {
                foreach($request->input('rounds.*.cards') as $cards){
                        foreach($cards as $card){
                            echo var_dump($card['value']);
                            $tmp_card = Card::firstOrCreate($card);
                            $tmp_round->cards()->attach($tmp_card->id);
                        }
                    

                }
            }
            if(count($request->input('rounds.*.actions')) > 0) {
                foreach($request->input('rounds.*.actions') as $actions){
                    foreach($actions as $action){

                        echo var_dump($action);

                        $action_tmp = new Action;
                        if(isset($action->value)) $action_tmp->value = $action->value;
    
            
                        $action_type_tmp = ActionType::firstOrCreate(['type'=>$action['type']]);
            
                        $action_tmp->action_type_id = $action_type_tmp->id;
                        $action_tmp->player_id = Player::firstOrCreate($action['player']);
                    }
                    
                }
            }
        }

        

        $hand_tmp->save();
        

        echo var_dump($tmp_player->id);

       // $hand->players()->attach($tmp_player)

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
