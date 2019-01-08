<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\Gate;

class AdminCheck
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
        if(!Gate::allows('isAdmin')) {
            abort(404, "Дядя, а вы точно админ?");
        }
        else {
            return $next($request);
        }
    }
}
