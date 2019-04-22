<?php

namespace App\Http\Controllers\SystemAdmin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SystemAdmin\DepartmentAdminRequest;
use App\Models\User;
use App\Models\Department;
use App\Models\DepartmentUser;
use Carbon\Carbon;
use File;

class CreateAnAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $searchDepartment = Department::pluck('name' ,'id');

        return view('system_admin.department_admin.create', compact('searchDepartment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentAdminRequest $request)
    {
        try {
        DB::beginTransaction();
        $input = $request->only('email', 'password', 'name', 'birth_date', 'gender', 'avatar', 'address', 'phone');
        $input['password'] = bcrypt($input['password']);
        $input['avatar'] = $this->savePicture($input);
        $input['role'] = config('setting.roles.admin_department');
        $idUser = User::insertGetId($input);

        $inputDepUser = $request->only('department_id', 'start_date');
        $inputDepUser['user_id'] = $idUser;
        $inputDepUser['position_id'] = config('setting.position.admin_department');

        DepartmentUser::create($inputDepUser);
        
        DB::commit();

        return redirect()->route('department-admin.index')->with('messageSuccess', 'Thêm Thành Công');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect(route('create-department-admin.create'))->with('alert', 'Thêm thất bại');
        }       
    }

    public function savePicture($input){
        if(isset($input['avatar']))
        {
            $file = $input['avatar'];
            $fileExtension = $input['avatar']->getClientOriginalExtension();
            $newName = 'avatar-'.time().'.'.$fileExtension;
            $path = public_path('images/avatar');
            $input['avatar'] = $newName;
            $file->move($path, $newName);
            return $newName;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
