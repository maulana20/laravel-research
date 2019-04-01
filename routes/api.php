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

Route::get('/game/list', 'GameController@list');
Route::get('/game/edit/{id}', 'GameController@edit');
Route::post('/game/ajaxadd', 'GameController@ajaxadd');
Route::post('/game/ajaxedit/{id}', 'GameController@ajaxedit');
Route::post('/game/ajaxdelete/{id}', 'GameController@ajaxdelete');
Route::post('/game/ajaxactive/{id}', 'GameController@ajaxactive');
Route::post('/game/ajaxinactive/{id}', 'GameController@ajaxinactive');

Route::get('/player/list', 'PlayerController@list');
Route::get('/player/edit/{id}', 'PlayerController@edit');
Route::post('/player/ajaxadd', 'PlayerController@ajaxadd');
Route::post('/player/ajaxedit/{id}', 'PlayerController@ajaxedit');
Route::post('/player/ajaxdelete/{id}', 'PlayerController@ajaxdelete');
Route::post('/player/ajaxactive/{id}', 'PlayerController@ajaxactive');
Route::post('/player/ajaxinactive/{id}', 'PlayerController@ajaxinactive');
