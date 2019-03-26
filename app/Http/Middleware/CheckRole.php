<?php

namespace App\Http\Middleware;

use Closure;

use App\Http\Controllers\ParentController;

class CheckRole extends ParentController
{
	public function handle($request, Closure $next)
	{
		var_dump($this->session); exit();
		$roles = $this->checkRoute($request->route());
		
		if ($user->hasRole($roles) || !$roles) return $next($request);
		
		return abort(503, 'Anda tidak memiliki hak akses');
	}
	
	public function checkRoute($route)
	{
		$actions = $route->getAction();
		
		return isset($actions['roles']) ? $actions['roles'] : null;
	}
}
