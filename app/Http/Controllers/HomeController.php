<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Document;
use App\Models\Message;
use App\Models\DepartmentUser;
use App\Models\DocumentDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $getIdDepartment = DepartmentUser::where('user_id', Auth::user()->id)->first();
        $department = Department::where('id', $getIdDepartment['department_id'])->first();
        return view('home', compact('department'));
    }
}
