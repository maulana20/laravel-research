<?php

namespace App\Http\Middleware;

use Closure;

use App\User;

class CheckRole
{
	public function handle($request, Closure $next)
	{
		$roles = $this->checkRoute($request->route());
		
		$user = new User();
		
		if ($user->hasRole($roles) || !$roles) return $next($request);
		
		return abort(503, 'Anda tidak memiliki hak akses');
	}
	
	public function checkRoute($route)
	{
		$actions = $route->getAction();
		
		return isset($actions['roles']) ? $actions['roles'] : null;
	}
}