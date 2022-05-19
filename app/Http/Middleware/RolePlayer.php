<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolePlayer
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
        if (auth()->user()->role == 3 && $role == 'player') {
            return $next($request);
        }

        return redirect()->route('host-dashboard');
    }
}
