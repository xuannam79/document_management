<?php

namespace App\Http\Middleware;

use Closure;

class CheckDepAdmin
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
        if(auth()->check())
        {
            if (auth()->user()->role == config('setting.roles.admin_department')
                && auth()->user()->is_active == config('setting.active.is_active'))
            {
                return $next($request);
            } else {
                return redirect()->route('not-found');
            }
        }

        return redirect()->route('login.index');
    }
}
