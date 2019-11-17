<?php

use Illuminate\Http\Request;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Http\Resources\HandResource;
use App\Models\Hand;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/hands', 'HandController@store')
    ->middleware('cors');
Route::get('/hands', 'HandController@index')
    ->middleware('cors');

Route::post('/register', 'AuthController@register')
    ->middleware('cors');

Route::post('/login', 'AuthController@login')
    ->middleware('cors');

Route::get('/me', 'AuthController@me')
    ->middleware('cors')
    ->middleware('jwt.auth');

Route::get('/player/{player}/hands/streak', 'HandController@getStreak')
    ->middleware('cors');
