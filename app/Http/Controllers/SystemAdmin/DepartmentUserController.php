<?php

namespace App\Http\Controllers\SystemAdmin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\Position;

class DepartmentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depUsers = DB::table('users')
                    ->select('department_users.id as department_user_id', 'start_date', 'end_date', 'users.name as username', 'departments.name as depname', 'positions.name as posname')
                    ->join('department_users', 'users.id', '=', 'department_users.user_id')
                    ->join('departments', 'department_users.department_id', '=', 'departments.id')
                    ->join('positions', 'positions.id', '=', 'department_users.position_id')
                    ->where('department_users.is_active', config('setting.active.is_active'))
                    ->get();


        return view('system_admin.department_user.index', compact('depUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $searchAdmin = User::pluck('name', 'id');
        $searchDepartment = Department::pluck('name' ,'id');
        $searchPosition = Position::pluck('name' , 'id');

        return view('system_admin.department_user.add', compact('searchAdmin', 'searchDepartment', 'searchPosition'));
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
            $input = $request->only('user_id', 'position_id', 'department_id', 'start_date', 'end_date');
            DepartmentUser::create($input);

            return redirect(route('department-user.index'))->with('alert', 'Thêm thành công');
        } catch (Exception $e) {
            return redirect(route('department-user.create'))->with('alert', 'Thêm thất bại');
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
        $depUsers = DB::table('users')
                    ->select('department_users.id as department_user_id', 'users.id as user_id', 'start_date', 'end_date', 'departments.id as department_id', 'positions.id as position_id')
                    ->join('department_users', 'users.id', '=', 'department_users.user_id')
                    ->join('departments', 'department_users.department_id', '=', 'departments.id')
                    ->join('positions', 'positions.id', '=', 'department_users.position_id')
                    ->where('department_users.id', $id)
                    ->first();
        $searchAdmin = User::pluck('name', 'id');
        $searchDepartment = Department::pluck('name' ,'id');
        $searchPosition = Position::pluck('name' , 'id');

        return view('system_admin.department_user.edit', compact('depUsers', 'searchAdmin', 'searchDepartment', 'searchPosition'));
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
        try {
            $dataUpdate = $request->only('user_id', 'position_id', 'department_id', 'start_date', 'end_date');
            $result = DepartmentUser::whereId($id)->update($dataUpdate);

            if ($result) {

                return redirect(route('department-user.edit', ['id' => $id] ))->with('alert', 'Sửa thành công');
            } else{

                return redirect(route('department-user.edit', ['id' => $id] ))->with('alert', 'Dữ liệu không được sửa đổi');
            }


        } catch (Exception $e) {

            return redirect(route('department-user.edit', ['id' => $id]))->with('alert', 'Sửa thất bại');
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
        try {
            $dataActive = config('setting.active.no_active');
            $result = DepartmentUser::whereId($id)->update(['is_active' => $dataActive]);

            if ($result) {

                return redirect(route('department-user.index'))->with('alert', 'Xóa thành công');
            } else {

                return redirect(route('department-user.index'))->with('alert', 'Xóa thất bại');
            }

        } catch (Exception $e) {

            return redirect(route('department-user.index'))->with('alert', 'Xóa thất bại');
        }
    }

    public function archive()
    {
        $depUsers = DB::table('users')
                    ->select('department_users.id as department_user_id', 'users.id as user_id', 'start_date', 'end_date', 'users.name as username', 'departments.name as department_name', 'positions.name as position_name')
                    ->join('department_users', 'users.id', '=', 'department_users.user_id')
                    ->join('departments', 'department_users.department_id', '=', 'departments.id')
                    ->join('positions', 'positions.id', '=', 'department_users.position_id')
                    ->where('department_users.is_active', config('setting.active.no_active'))
                    ->get();

        return view('system_admin.department_user.archive', compact('depUsers'));
    }

    public function restore($id)
    {
        try {
            $active = config('setting.active.is_active');
            $result = DepartmentUser::whereId($id)->update(['is_active' => $active]);

            if ($result) {

                return redirect(route('department-user-archived'))->with('alert', 'Khôi phục thành công');
            } else {

                return redirect(route('department-user-archived'))->with('alert', 'Không tìm thấy');
            }

        } catch (Exception $e) {

            return redirect(route('department-user-archived'))->with('alert', 'Khôi phục thất bại');
        }
    }    
}
