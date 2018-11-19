<?php

namespace App\Http\Middleware;

use Closure;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $rol
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {

        if ($request->user()->rol!=$rol|| empty($request) )
        {
            return view('welcome');
        }
        return $next($request);
    }
}
