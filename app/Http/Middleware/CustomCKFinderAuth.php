<?php

namespace App\Http\Middleware;

use Closure;
use Encore\Admin\Facades\Admin;

class CustomCKFinderAuth
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
            config(['ckfinder.authentication' => function() use ($request) {
				if(!Admin::guard()->guest() && Admin::user())
					return true;
				else return false;
            }] );
        
        return $next($request);
    }
}
