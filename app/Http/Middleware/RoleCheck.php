<?php

namespace App\Http\Middleware;

use Closure;

class RoleCheck
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
        if ($request->user()->role !== 'admin') {
            return redirect('/login');
        }

        return $next($request);
    }
}
