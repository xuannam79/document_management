<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfrastructureController extends Controller
{
    public function index()
    {
        $departmentId = DepartmentUser::where('user_id', Auth::user()->id)->first()->department_id;
        $departments = Department::where('id', $departmentId)->first()->name;
        $infrastructure = Infrastructure::where(['is_active' => config('setting.active.is_active'), 'department_id' => $departmentId])->get();

        return view('infrastructure', compact( 'infrastructure', 'departments'));
    }
}
