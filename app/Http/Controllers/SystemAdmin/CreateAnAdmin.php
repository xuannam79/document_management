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
use App\Traits\Uploader;
use File;

class CreateAnAdmin extends Controller
{
    use Uploader;
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
        $searchDepartment = DB::table('departments')
            ->whereNotIn('departments.id', 
            DepartmentUser::where('position_id', config('setting.position.admin_department'))->pluck('department_id'))
            ->pluck('name', 'id');

        return view('system_admin.department_admin.create', compact('searchDepartment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
        DB::beginTransaction();
        $input = $request->only('email', 'password', 'name', 'birth_date', 'gender', 'avatar', 'address', 'phone');
        $input['password'] = bcrypt($input['password']);
        $input['avatar'] = $this->saveImg($input['avatar']);
        $input['role'] = config('setting.roles.admin_department');
        $idUser = User::insertGetId($input);

        $inputDepUser = $request->only('department_id');
        $inputDepUser['user_id'] = $idUser;
        $inputDepUser['position_id'] = config('setting.position.admin_department');
        $inputDepUser['start_date'] = date('Y-m-d h:m:s', strtotime($request->start_date));
        DepartmentUser::create($inputDepUser);
        
        DB::commit();

        return redirect()->route('department-admin.index')->with('messageSuccess', 'Thêm Thành Công');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect(route('create-department-admin.create'))->with('alert', 'Thêm thất bại');
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
