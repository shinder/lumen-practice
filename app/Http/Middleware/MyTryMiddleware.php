<?php

namespace App\Http\Middleware;

use Closure;

class MyTryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $who='there')
    {
        echo "Hello $who <br>";
        return $next($request);
    }
}
