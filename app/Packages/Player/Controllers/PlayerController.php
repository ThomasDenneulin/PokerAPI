<?php

namespace App\Http\Controllers;

use App\Player;
use App\Http\Resources\PlayerResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;


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
