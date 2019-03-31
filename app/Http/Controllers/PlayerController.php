<?php

namespace App\Http\Controllers;

use App\Player;
use App\Http\Resources\Player as PlayerResource;

class PlayerController extends Controller
{
    public function edit($id)
    {
		return new PlayerResource(Player::find($id));
	}
}