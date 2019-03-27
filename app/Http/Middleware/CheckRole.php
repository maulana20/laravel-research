<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CheckRole extends Authenticatable
{
	public function handle($request, Closure $next)
	{
		$this->have_role = $request->session()->get('acl');
		
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
		$acl = unserialize($this->have_role);
		if ( empty($acl) || !is_array($acl) ) return false;
		
		return ( in_array($role, $acl) ) ? true : false;
	}
}
