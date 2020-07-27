<?php

namespace App\Http\Middleware;

use Closure;

class GlobalAfterMiddleware
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
        $response = $next($request);
        $x_shin = $request->headers->get('X-Shin');

        $response->header('X-Shin', $x_shin. 'after-');
        return $response;
    }
}
