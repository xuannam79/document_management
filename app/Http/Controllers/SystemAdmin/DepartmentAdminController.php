<?php

namespace App\Http\Controllers\SystemAdmin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\Position;

class DepartmentAdminController extends Controller
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
                    ->where('department_users.position_id', config('setting.position.admin_department'))
                    ->get();

        return view('system_admin.department_admin.index', compact('depUsers'));
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

        return view('system_admin.department_admin.add', compact('searchAdmin', 'searchDepartment'));
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

            $input = $request->only('user_id', 'department_id', 'start_date', 'end_date');
            $input['position_id'] = config('setting.position.admin_department');

            $getAllDepartment = DepartmentUser::all();
            foreach ($getAllDepartment as $depUser) {
                if ($input['department_id'] == $depUser->department_id 
                    && $input['user_id'] == $depUser->user_id) {

                    return redirect()->route('department-admin.create')->with('alert', 'Người này đã là trưởng đơn vị của phòng ban này rồi! Vui lòng vào khu vực Trưởng đơn vị đã xóa để khôi phục nếu bạn đã xóa người này khỏi danh sách! ');
                }
            }
            DepartmentUser::create($input);
            DB::commit();

            return redirect(route('department-admin.index'))->with('alert', 'Thêm thành công');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect(route('department-admin.create'))->with('alert', 'Thêm thất bại');
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
        $searchPosition = Position::whereId(config('setting.position.admin_department'))->first();

        return view('system_admin.department_admin.edit', compact('depUsers', 'searchAdmin', 'searchDepartment', 'searchPosition'));
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
            $dataUpdate = $request->only('user_id', 'department_id', 'start_date', 'end_date');
            $dataUpdate['position_id'] = config('setting.position.admin_department');
            $result = DepartmentUser::whereId($id)->update($dataUpdate);

            if ($result) {

                return redirect(route('department-admin.edit', ['id' => $id] ))->with('alert', 'Sửa thành công');
            } else{

                return redirect(route('department-admin.edit', ['id' => $id] ))->with('alert', 'Dữ liệu không được sửa đổi');
            }


        } catch (Exception $e) {

            return redirect(route('department-admin.edit', ['id' => $id]))->with('alert', 'Sửa thất bại');
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
            DB::beginTransaction();
            $dataActive = config('setting.active.no_active');
            $roleUser = config('setting.roles.user');
            DepartmentUser::whereId($id)->update(['is_active' => $dataActive]);
            $getUserId = DepartmentUser::select('user_id')->whereId($id)->first();

            User::whereId($getUserId->user_id)->update(['role' => $roleUser]);

            DB::commit();
            
            return redirect(route('department-admin.index'))->with('alert', 'Xóa thành công');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect(route('department-admin.index'))->with('alert', 'Xóa thất bại');
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
                    ->where('department_users.position_id', config('setting.position.admin_department'))
                    ->get();


        return view('system_admin.department_admin.archive', compact('depUsers'));
    }

    public function restore($id)
    {
        try {
            DB::beginTransaction();
            $active = config('setting.active.is_active');
            $roleDepUser = config('setting.roles.admin_department');
            DepartmentUser::whereId($id)->update(['is_active' => $active]);
            $getDepUser = DepartmentUser::select('user_id')->whereId($id)->first();

            User::whereId($getDepUser->user_id)->update(['role' => $roleDepUser]);
            
            DB::commit();

            return redirect(route('department-admin-archived'))->with('alert', 'Khôi phục thành công');

        } catch (Exception $e) {
            DB::rollBack();

            return redirect(route('department-admin-archived'))->with('alert', 'Khôi phục thất bại');
        }
    }
}
