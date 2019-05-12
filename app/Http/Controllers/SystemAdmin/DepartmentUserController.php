<?php

namespace App\Http\Controllers\SystemAdmin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\Position;
use Carbon\Carbon;

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
                    ->select('department_users.user_id as department_user_id', 'start_date', 'end_date', 'users.name as username', 'departments.name as depname', 'positions.name as posname')
                    ->join('department_users', 'users.id', '=', 'department_users.user_id')
                    ->join('departments', 'department_users.department_id', '=', 'departments.id')
                    ->join('positions', 'positions.id', '=', 'department_users.position_id')
                    ->where('users.role', '!=', config('setting.roles.system_admin'))
                    ->where('department_users.position_id', '!=', config('setting.position.admin_department'))
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $depUsers = User::findOrFail($id);
        $currentDepartment = DepartmentUser::with('department')
            ->where('user_id', $id)
            ->first()
            ->toArray();
        $searchDepartment = DB::table('departments')
            ->whereIn('departments.id', 
            DepartmentUser::where('position_id', config('setting.position.admin_department'))->pluck('department_id'))
            ->pluck('name', 'id');
        $searchPosition = Position::where('id', '!=', config('setting.position.admin_department'))->pluck('name' , 'id');

        return view('system_admin.department_user.edit', compact('depUsers', 'currentDepartment', 'searchDepartment', 'searchPosition'));
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
            $dataUpdate = $request->only('department_id', 'position_id');

            $result = DepartmentUser::where('user_id', $id)->update($dataUpdate);

            if ($result) {

                return redirect(route('department-user.index', ['id' => $id] ))->with('messageSuccess', 'Sửa thành công');
            } else{

                return redirect(route('department-user.edit', ['id' => $id] ))->with('messageFail', 'Dữ liệu không được sửa đổi');
            }


        } catch (Exception $e) {

            return redirect(route('department-user.edit', ['id' => $id]))->with('messageFail', 'Sửa thất bại');
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
    }   
}
