<?php

namespace App\Http\Middleware;

use Closure;

class IncrementPageViewCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $page = $request->route('page');
//
//        visits($page)->increment(1);

        return $next($request);
    }
}
