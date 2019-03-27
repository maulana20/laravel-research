<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CheckRole extends Authenticatable
{
	public function handle($request, Closure $next)
	{
		var_dump($request->session()->get('acl'));
		$roles = $this->checkRoute($request->route());
		
		if ($this->hasRole($roles) || !$roles) return $next($request);
		
		return abort(503, 'Anda tidak memiliki hak akses');
	}
	
	public function checkRoute($route)
	{
		$actions = $route->getAction();
		
		return isset($actions['roles']) ? $actions['roles'] : null;
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
	
	public function getRole()
	{
		return $this->role()->getResults();
	}
	
	public function isInRole($role)
	{
		return true;
		if (empty($this->have_role)) return false;
		
		return ( strtolower($role) == strtolower($this->have_role->profile_code) ) ? true : false;
	}
}
