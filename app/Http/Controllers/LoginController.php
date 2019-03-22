<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends ParentController
{
	public function index()
	{
		$this->printResponse('success', 'Selamat datang di login !', '');
	}
}
