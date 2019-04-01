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
		$this->printResponse('success', 'Berhasil game list !', ['list' => Game::where('game_status', '<>', 'D')->get()]);
	}
	
	public function edit($id)
	{
		$this->printResponse('success', 'Berhasil game tampil edit !', ['list' => Game::find($id)]);
		
		//return new GameResource(Game::find($id));
	}
	
	public function ajaxadd(Request $request)
	{
		$param = $request->all();
		
		$game = new Game;
		$game->game_name = $param['name'];
		$game->game_status = 'A';
		$game->save();
		
		$this->printResponse('success', 'Berhasil game ajax add !', NULL);
	}
	
	public function ajaxedit(Request $request, $id)
	{
		$param = $request->all();
		
		Game::where('game_id', $id)->update(['game_name' => $param['name']]);
		
		$this->printResponse('success', 'Berhasil game ajax edit !', NULL);
	}
	
	public function ajaxdelete($id)
	{
		Game::where('game_id', $id)->update(['game_status' => 'D']);
		
		$this->printResponse('success', 'Berhasil game ajax delete !', NULL);
	}
	
	public function ajaxactive($id)
	{
		Game::where('game_id', $id)->update(['game_status' => 'A']);
		
		$this->printResponse('success', 'Berhasil game ajax active !', NULL);
	}
	
	public function ajaxinactive($id)
	{
		Game::where('game_id', $id)->update(['game_status' => 'I']);
		
		$this->printResponse('success', 'Berhasil game ajax inactive !', NULL);
	}
}
