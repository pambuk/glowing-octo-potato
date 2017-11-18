<?php

namespace App\Http\Middleware;

use Closure;
use Silber\Bouncer\BouncerFacade as Bouncer;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (Bouncer::is(\Auth::user())->notAn($role)) {
            return redirect('/');
        }

        return $next($request);
    }
}
