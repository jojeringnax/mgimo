<?php

namespace App\Http\Middleware;

use Closure;
use Mockery\Exception;

class CheckNav
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

        try {

            $active = explode('/', $request->url());

            $result = count($active) <= 3 ? 'main' : $active[3] === 'public' ? $active[4] : $active[3];

            $request->merge(['active' => $result]);

            return $next($request);
        } catch (Exception $e) {
            $request->merge(['active' => 'main']);
            return $next($request);
        }
    }
}
