<?php

namespace App\Http\Middleware;

use Closure;

class UserCheckMiddleware
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
        if (!$request->session()->has('user')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
