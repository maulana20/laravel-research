<?php

use Illuminate\Http\Request;

use App\Game;
use App\Player;

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

Route::get('/game/list', function () {
	return Game::all();
});
Route::get('/game/edit/{id}', 'GameController@edit');


Route::get('/player/list', function () {
	return Player::all();
});
Route::get('/player/edit/{id}', 'PlayerController@edit');
