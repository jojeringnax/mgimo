<?php

namespace App\Http\Middleware;

use Closure;

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
        $active = explode('/',$request->url());
        if (count($active) <= 4) {
            $result = 'main';
        } else {
            $result = $active[3] === 'public' ? $active[4] : $active[3];
        }
        $request->merge(['active' => $result]);
        return $next($request);
    }
}
