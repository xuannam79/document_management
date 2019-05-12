<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $departmentId = DepartmentUser::where('user_id', Auth::user()->id)->first()->department_id;
        $departments = Department::where('id', $departmentId)->first()->name;
        $users = User::join('department_users', 'department_users.user_id', '=', 'users.id')
            ->join('positions', 'positions.id', 'department_users.position_id')
            ->where(['department_users.department_id' => $departmentId, 'users.is_active' => config('setting.active.is_active')])
            ->select('users.*', 'department_users.*', 'positions.name as position_name')
            ->get();

        return view('member', compact('users', 'departments'));
    }
}
