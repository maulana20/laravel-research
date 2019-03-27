<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
	protected $table = 'tblUser';
	
	public function getRow($user_id)
	{
		$user_data = User::where('user_id', '=', $user_id)->first();
		
		return $user_data;
	}
	
	public function getId($user)
	{
		$user_data = User::where('user_name', '=', $user)->first();
		
		return $user_data->user_id;
	}
	
	public function isUserPassword($user, $password)
	{
		$user_data = User::where('user_name', '=', $user)->where('password', '=', md5($password))->first();
		
		return (!empty($user_data->user_id));
	}
}
