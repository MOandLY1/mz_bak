<?php

namespace App\Http\Middleware;

use Closure;

class ChackUser
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
        if (empty(session('user'))){
            return redirect()->route('/land');;
        }
        return $next($request);
    }
}
