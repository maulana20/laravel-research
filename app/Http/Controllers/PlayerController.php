<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ParentController;

use Illuminate\Http\Request;

use App\Player;
use App\Http\Resources\Player as PlayerResource;

class PlayerController extends ParentController
{
	public function list()
	{
		$list = \DB::table('tblPlayer')
				->join('tblGame', 'tblGame.game_id', '=', 'tblPlayer.game_id')
				->select('tblPlayer.player_id', 'tblPlayer.player_name', 'tblGame.game_name', 'tblPlayer.player_score', 'tblPlayer.player_status')
				->where('tblPlayer.player_status', '<>', 'D')
				->get();
		
		$this->printResponse('success', 'Berhasil player list !', ['list' => $list]);
	}
	
	public function edit($id)
	{
		$this->printResponse('success', 'Berhasil player tampil edit !', ['list' => Player::find($id)]);
	}
	
	public function ajaxedit(Request $request, $id)
	{
		$param = $request->all();
		
		Player::where('player_id', $id)->update(['player_name' => $param['name'], 'player_score' => $param['score']]);
		
		$this->printResponse('success', 'Berhasil player ajax edit !', NULL);
	}
	
	public function ajaxdelete($id)
	{
		Player::where('player_id', $id)->update(['player_status' => 'D']);
		
		$this->printResponse('success', 'Berhasil player ajax delete !', NULL);
	}
	
	public function ajaxactive($id)
	{
		Player::where('player_id', $id)->update(['player_status' => 'A']);
		
		$this->printResponse('success', 'Berhasil player ajax active !', NULL);
	}
	
	public function ajaxinactive($id)
	{
		Player::where('player_id', $id)->update(['player_status' => 'I']);
		
		$this->printResponse('success', 'Berhasil player ajax inactive !', NULL);
	}
}
