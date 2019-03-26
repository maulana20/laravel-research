<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
	
	public function role()
	{
		return $this->belongsTo('App\Role');
	}
	
	public function hasRole($roles)
	{
		$this->have_role = $this->getRole();
		if (is_array($roles)) {
			foreach ($roles as $need_role) {
				if ($this->isInRole($need_role)) return true;
			}
		} else {
			return $this->isInRole($roles);
		}
	}
	
	private function getRole()
	{
		return $this->role()->getResults();
	}
	
	private function isInRole($role)
	{
		return true;
		if (empty($this->have_role)) return false;
		
		return ( strtolower($role) == strtolower($this->have_role->profile_code) ) ? true : false;
	}
}
