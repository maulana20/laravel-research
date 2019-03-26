<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;

class AdminController extends ParentController
{
	public function index()
	{
		$this->printResponse('success', 'Selamat datang di login !', '');
	}
	
	public function login(Request $request)
	{
		$user = new User();
		
		$username = $request->input('user');
		$password = $request->input('password');
		
		if ($user->isUserPassword($username, $password)) {
			$user_id = $user->getId($username);
			$user_row = $user->getRow($user_id);
			
			$group = new Group();
			$access = $group->getAccess($user_row->group_id);
			$this->session::put('acl', $access);
			
			$this->printResponse('success', 'Berhasil login !', '');
		} else {
			$this->printResponse('failed', 'Gagal login !', '');
		}
	}
}
