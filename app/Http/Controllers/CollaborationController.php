<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\SystemAdmin\CollaborationUnitEditRequest;
use App\Http\Requests\SystemAdmin\CollaborationUnitRequest;
use App\Models\CollaborationUnit;
use App\Models\DepartmentUser;
use App\Models\User;
use App\Models\Department;

class CollaborationController extends Controller
{
    public function index(){
        $getDepartment = DepartmentUser::with([
            'user',
            'department'
        ])->where('user_id', Auth::user()->id)
        ->first()->toArray();
        $getIdDepartment = $getDepartment['department']['id'];

        $collaborationUnits = CollaborationUnit::where('department_id', $getIdDepartment)
            ->where('is_active', config('setting.active.is_active'))->get();

        return view('collaboration', compact('collaborationUnits'));
    }
}
