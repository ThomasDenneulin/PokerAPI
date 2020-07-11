<?php

/**
 * @api {get} /api/player/:playerId/hands/streak Get streak
 * @apiGroup Player
 * @apiPermission Authenticated
 *
 * @apiParam (Segments) {Integer} playerId The ID of the player.
 */
Route::get('/player/{player}/hands/streak', 'HandController@getStreak')
    ->middleware('cors');
