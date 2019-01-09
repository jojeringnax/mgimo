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
        $public = $active[3] === 'public';
        if (($public && count($active) <= 4) || (!$public && count($active) <= 3)) {
            $result = 'main';
        } else {
            $result = $public ? $active[4] : $active[3];
        }
        $request->merge(['active' => $result]);
        return $next($request);
    }
}
