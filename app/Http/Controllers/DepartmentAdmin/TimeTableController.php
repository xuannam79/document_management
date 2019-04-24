<?php

namespace App\Http\Controllers\DepartmentAdmin;

use App\Models\DepartmentUser;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimeTableController extends Controller
{
    public function index(){
        $departmentUser = DepartmentUser::where('user_id', Auth::user()->id)->first();
        $timeTable = TimeTable::where('is_active', config('setting.active.is_active'))
            ->where('department_id', $departmentUser->department_id)
            ->get();

        return view('department_admin.timetable.index', compact('timeTable'));
    }

    public function saveFile($input){
        if(isset($input['file_attachment']))
        {
            foreach($input['file_attachment'] as $file)
            {
                $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $fileExtension = $file->getClientOriginalExtension();
                $newName = $fileName.'-'.time().'.'.$fileExtension;
                $path = public_path('files/department_admin/timetables');
                $file->move($path, $newName);
                $data[] = $newName;
            }
            return $data;
        }
    }
    public function saveTimeTable($input){
        $departmentUser = DepartmentUser::where('user_id', Auth::user()->id)->first();
        $input['user_id'] = Auth::user()->id;
        $input['is_active'] = config('setting.active.is_active');
        $input['department_id'] = $departmentUser->department_id;

        return $input;
    }

    public function download($nameFile){
        $pathToFile = public_path('files/department_admin/timetables/'.$nameFile);

        return response()->download($pathToFile);
    }

    public function create()
    {
        return view('department_admin.timetable.add');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            if(!isset($input['file_attachment'])){
                $input = $this->saveTimeTable($input);
                TimeTable::create($input);
            }
            else {
                $data = $this->saveFile($input);
                $input['file_attachment'] = json_encode($data);
                $input = $this->saveTimeTable($input);
                TimeTable::create($input);
            }
            DB::commit();

            return redirect()->route('timetable.index')->with('messageSuccess', 'Thêm Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->route('timetable.index')->with('messageFail', 'Thêm Thất Bại');
        }

    }

    public function show($id)
    {
        try
        {
            //array file attachment
            $fileString = TimeTable::where('id', $id)->first();
            $arrayFileDecode = array();
            if(isset($fileString['file_attachment'])){
                $arrayFileDecode = json_decode($fileString['file_attachment']);
            }

            $timeTable = TimeTable::where('id',$id)->first() ;

            return view('department_admin.timetable.edit', compact('timeTable', 'arrayFileDecode'));
        }
        catch (Exception $exception)
        {
            return redirect()->back()->with('messageFail', "Lỗi Hệ Thống");
        }
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        DB::beginTransaction();
        try
        {
            if(!isset($input['file_attachment'])){
                TimeTable::find($id)->update(['name' => $input['name'], 'description' => $input['description']]);
            }
            else {
                $data = $this->saveFile($input);
                $input['file_attachment'] = json_encode($data);
                TimeTable::find($id)->update($input);
            }
            DB::commit();

            return redirect()->route('timetable.index')->with('messageSuccess', 'Cập Nhật Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->route('timetable.index')->with('messageFail', 'Cập Nhật Thất Bại');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try
        {
            $timeTable = TimeTable::findOrFail($id);
            $timeTable->update(['is_active' => config('setting.active.no_active')]);
            DB::commit();

            return redirect()->route('timetable.index')->with('messageSuccess', 'Xóa Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->back()->with('messageFail', 'Xóa Thất Bại');
        }
    }

    public function archiveIndex(){
        $timeTable = TimeTable::where('is_active',config('setting.active.no_active'))->get();

        return view('department_admin.timetable.archive', compact( 'timeTable'));
    }

    public function restore($id){
        DB::beginTransaction();
        try
        {
            TimeTable::find($id)->update(['is_active' => config('setting.active.is_active')]);
            DB::commit();

            return redirect()->route('timetable.archive')->with('messageSuccess', 'Hoàn Tác Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->route('timetable.archive')->with('messageFail', 'Hoàn Tác Thất Bại');
        }
    }

}
