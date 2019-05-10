<?php

namespace App\Http\Middleware;

use App\Models\DepartmentUser;
use Closure;

class CheckIsTrainningDepartment
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
            $departmentId = DepartmentUser::where('user_id', auth()->user()->id)->first()->department_id;
            if (auth()->user()->role == config('setting.roles.admin_department') and $departmentId == config('setting.department_name.training_department') )
            {
                return $next($request);
            } else {
                return redirect()->route('not-found');
            }
        }

        return redirect()->route('schedule-week.nologin');
    }
}
