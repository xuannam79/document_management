<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TimeTableController extends Controller
{
    public function index(){
        $departmentUser = DepartmentUser::where('user_id', Auth::user()->id)->first();
        $timeTable = TimeTable::where('is_active', config('setting.active.is_active'))
            ->where('department_id', $departmentUser->department_id)
            ->get();

        return view('timetable.index', compact('timeTable'));
    }

    public function show($id)
    {
        try
        {
            $departmentUser = DepartmentUser::where('user_id', Auth::user()->id)->first();
            $department = Department::where('id',$departmentUser->department_id)->first();
            $timeTableRandom = TimeTable::where('is_active', config('setting.active.is_active'))
                ->where('department_id', $departmentUser->department_id)
                ->where('id', '!=', $id)
                ->orderBy(DB::raw('RAND()'))
                ->limit(5)
                ->get();
            //array file attachment
            $fileString = TimeTable::where('id', $id)->first();
            $arrayFileDecode = array();
            if(isset($fileString['file_attachment'])){
                $arrayFileDecode = json_decode($fileString['file_attachment']);
            }

            $timeTable = TimeTable::where('id',$id)->first() ;

            return view('timetable.detail', compact('timeTable', 'department',  'timeTableRandom','arrayFileDecode'));
        }
        catch (Exception $exception)
        {
            return redirect()->back()->with('messageFail', "Lỗi Hệ Thống");
        }
    }
}
