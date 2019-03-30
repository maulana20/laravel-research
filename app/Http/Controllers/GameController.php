<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Game;
use App\Http\Resources\Game as GameResource;

class GameController extends Controller
{
    public function show($id)
    {
		return new GameResource(Game::find($id));
	}
}
