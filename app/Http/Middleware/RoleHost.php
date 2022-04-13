<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleHost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$role)
    {
        if (auth()->user()->role == 2 && $role == 'host') {
            return $next($request);
        }
        
        return redirect()->route('player-dashboard');
    }
}
