<?php

namespace App\Http\Middleware;

use Closure;

class RoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        if (in_array($request->session()->get('user')->role, explode('|', $roles))) {
            return $next($request);
        } else {
            return redirect('/login');
        }
    }
}
