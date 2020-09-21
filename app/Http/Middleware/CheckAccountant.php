<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccountant
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
        if (is_accountant()) {
            return redirect()->route('access_page');
        }

        return $next($request);
    }
}
