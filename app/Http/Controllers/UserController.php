<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends ParentController
{
	public function index()
	{
		$this->printResponse('success', 'Selamat datang di user !', '');
	}
	
	public function list()
	{
		$user_list = User::all();
		$this->printResponse('success', 'User list success !', ['list'=> $user_list]);
	}
	
	public function edit(Request $request)
	{
		$user_id = $request->input('id');
		if (empty($user_id)) $this->printResponse('failed', 'User id not found !', '');
		
		$user_row = User::where('user_id', $user_id)->first();
		
		$this->printResponse('success', 'User list success !', ['list'=> $user_row]);
	}
}
