<?php

namespace App\Http\Middleware;

use Closure;
use App\Parents;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$parents = new Parents();
		
        $roles = $this->checkRoute($request->route());
        
        if ($parents->hasRole($roles) || !$roles) return $next($request);
        
        return abort(503, 'Anda tidak memiliki hak akses');
    }
    
    public function checkRoute($route)
    {
		$actions = $route->getAction();
		
		return isset($actions['roles']) ? $actions['roles'] : null;
	}
}
