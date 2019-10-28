<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Http\Resources\PlayerResource;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    //
    public function index()
    {
        //
        // Get the posts
        $players = Player::paginate(5);
        
        // Return collection of posts as a resource
        return PlayerResource::collection($players);
    }
    
    public function store(Request $request)
    {
        //
         //  Allow for post update *or* create a new post
         $player      = $request->isMethod('put') ? Post::findOrFail($request->id) : new Player;
         $player->id   = $request->input('id');
         $player->seat = $request->input('seat');
         $player->name  = $request->input('name');
         $player->hands_id  = $request->input('hands_id');

         
         if ($post->save()) {
             return new PlayerResource($player);
         }
    }
    
    public function show($id)
    {
        //
        $player = Player::findOrFail($id);

        return new PlayerResource($player);
    }
    
    public function destroy($id)
    {
        //
    }
}
