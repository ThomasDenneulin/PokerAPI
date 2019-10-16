<?php

namespace App\Http\Controllers;

use App\Player;
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
        $player = Player::firstOrCreate(['name' => $data['player']['name']]);
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
