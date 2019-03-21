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
		$this->printResponse('success', 'User list success !', ['list'=> User::all()]);
	}
}
