<?php

namespace App\Http\Middleware;

use Closure;

class CheckWorker
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
        if (is_worker()) {
            return redirect()->route('access_page');
        }

        return $next($request);
    }
}
