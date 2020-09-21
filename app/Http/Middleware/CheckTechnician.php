<?php

namespace App\Http\Middleware;

use Closure;

class CheckTechnician
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
        if (is_technician()) {
            return redirect()->route('access_page');
        }

        return $next($request);
    }
}
