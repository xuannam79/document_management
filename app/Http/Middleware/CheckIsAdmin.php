<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdmin
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
            if (auth()->user()->role == config('setting.roles.system_admin') 
                || auth()->user()->role == config('setting.roles.admin_department'))
            {

                return $next($request);
            } else {

                return redirect()->route('home-page');
            }
        }

        return redirect()->route('login.index');
    }
}
