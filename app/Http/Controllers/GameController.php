<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ParentController;

use Illuminate\Http\Request;

use App\Game;
use App\Http\Resources\Game as GameResource;

class GameController extends ParentController
{
	public function list()
	{
		$this->printResponse('success', 'Berhasil game list !', ['list' => Game::all()]);
	}
	
    public function edit($id)
    {
		$this->printResponse('success', 'Berhasil game tampil edit !', ['list' => Game::find($id)]);
		
		//return new GameResource(Game::find($id));
	}
	
	public function ajaxedit(Request $request, $id)
	{
		$param = $request->all();
		
		Game::where('game_id', $id)->update(['game_name' => $param['name']]);
		
		$this->printResponse('success', 'Berhasil game ajax edit !', NULL);
	}
}
