<?php

namespace App\Http\Controllers\DepartmentAdmin;

use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\Form;
use App\Models\Position;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentAdmin\FormManagementRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use File;

class FormManagementController extends Controller
{
    public function index()
    {
        $forms = Form::where('is_active', config('setting.active.is_active'))->get();

        return view('department_admin.forms.index', compact( 'forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department_admin.forms.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormManagementRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            if(!isset($input['link'])){
                $input['link'] = null;
                Form::create($input);
            }
            else {
                $data = $this->saveFile($input);
                $input['link'] = json_encode($data);
                Form::create($input);
            }
            DB::commit();

            return redirect()->route('forms.index')->with('messageSuccess', 'Thêm Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->route('forms.index')->with('messageFail', 'Thêm Thất Bại');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function archiveIndex(){
        $forms = Form::where('is_active',config('setting.active.no_active'))->get();

        return view('department_admin.forms.archive', compact( 'forms'));
    }

    public function restore($id){
        DB::beginTransaction();
        try
        {
            Form::find($id)->update(['is_active' => config('setting.active.is_active')]);
            DB::commit();

            return redirect()->route('forms.archive')->with('messageSuccess', 'Hoàn Tác Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->route('forms.archive')->with('messageFail', 'Hoàn Tác Thất Bại');
        }
    }

    public function download($nameFile){
        $pathToFile = public_path('files/department_admin/forms/'.$nameFile);

        return response()->download($pathToFile);
    }

    public function saveFile($input){
        if(isset($input['link']))
        {
            foreach($input['link'] as $file)
            {
                $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $fileExtension = $file->getClientOriginalExtension();
                $newName = $fileName.'-'.time().'.'.$fileExtension;
                $path = public_path('files/department_admin/forms');
                $file->move($path, $newName);
                $data[] = $newName;
            }
            return $data;
        }
    }

    public function show($id)
    {
        try
        {
            //array file attachment
            $fileString = Form::where('id', $id)->first();
            $arrayFileDecode = array();
            if(isset($fileString['link'])){
                $arrayFileDecode = json_decode($fileString['link']);
            }

            $forms = Form::where('id',$id)->first() ;

            return view('department_admin.forms.edit', compact('forms', 'arrayFileDecode'));
        }
        catch (Exception $exception)
        {
            return redirect()->back()->with('messageFail', "Lỗi Hệ Thống");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormManagementRequest $request, $id)
    {
        $input = $request->all();
        DB::beginTransaction();
        try
        {
            if(!isset($input['link'])){
                Form::find($id)->update(['name' => $input['name'], 'description' => $input['description']]);
            }
            else {
                $input['link'] = $this->saveFile($input);
                Form::find($id)->update($input);
            }
            DB::commit();

            return redirect()->route('forms.index')->with('messageSuccess', 'Cập Nhật Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->route('forms.index')->with('messageFail', 'Cập Nhật Thất Bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try
        {
            $forms = Form::findOrFail($id);
            $forms->update(['is_active' => config('setting.active.no_active')]);
            DB::commit();

            return redirect()->route('forms.index')->with('messageSuccess', 'Xóa Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->back()->with('messageFail', 'Xóa Thất Bại');
        }
    }
}
