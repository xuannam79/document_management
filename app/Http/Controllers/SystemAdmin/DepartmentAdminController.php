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
use App\Traits\ManagingRole;
use App\Traits\Uploader;

class DepartmentAdminController extends Controller
{
    use ManagingRole;
    use Uploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depUsers = DB::table('users')
                    ->select('department_users.user_id as department_user_id', 'start_date', 'end_date', 'users.name as username', 'departments.name as depname', 'positions.name as posname', 'users.created_at as date_start')
                    ->join('department_users', 'users.id', '=', 'department_users.user_id')
                    ->join('departments', 'department_users.department_id', '=', 'departments.id')
                    ->join('positions', 'positions.id', '=', 'department_users.position_id')
                    ->where('department_users.position_id', config('setting.position.admin_department'))
                    ->where('users.is_active', config('setting.active.is_active'))
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
        $searchDepartment = DepartmentUser::with('department')
            ->where('user_id', $id)
            ->first()
            ->toArray();

        return view('system_admin.department_admin.edit', compact('depUsers', 'searchDepartment'));
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
            $dataUpdate = $request->only('email', 'name', 'birth_date', 'gender', 'avatar', 'address', 'phone');
            if (isset($dataUpdate['avatar'])) {
                $dataUpdate['avatar'] = $this->saveImg($dataUpdate['avatar']);
            } else {
                $dataUpdate['avatar'] = User::findOrFail($id)->avatar;
            }

            $result = User::whereId($id)->update($dataUpdate);

            if ($result) {

                return redirect(route('department-admin.edit', ['id' => $id] ))->with('messageSuccess', 'Sửa thành công');
            } else{

                return redirect(route('department-admin.edit', ['id' => $id] ))->with('messageFail', 'Dữ liệu không được sửa đổi');
            }


        } catch (Exception $e) {

            return redirect(route('department-admin.edit', ['id' => $id]))->with('messageFail', 'Sửa thất bại');
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
            $no_active = config('setting.active.no_active');
            // chuyển is active thành 0
            User::whereId($id)->update(['is_active' => $no_active]);
            DB::commit();
            
            return redirect(route('department-admin-archived'))->with('messageSuccess', 'Xóa thành công');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect(route('department-admin.index'))->with('messageFail', 'Xóa thất bại');
        }
    }

    public function archive()
    {
        $depUsers = DB::table('users')
                    ->select('department_users.user_id as department_user_id', 'start_date', 'end_date', 'users.name as username', 'departments.name as depname', 'positions.name as posname')
                    ->join('department_users', 'users.id', '=', 'department_users.user_id')
                    ->join('departments', 'department_users.department_id', '=', 'departments.id')
                    ->join('positions', 'positions.id', '=', 'department_users.position_id')
                    ->where('department_users.position_id', config('setting.position.admin_department'))
                    ->where('users.is_active', config('setting.active.no_active'))
                    ->get();

        return view('system_admin.department_admin.archive', compact('depUsers'));
    }
    
    public function restore($id)
    {
        try {
            DB::beginTransaction();
            $is_active = config('setting.active.is_active');
            // chuyển is active thành 1
            User::whereId($id)->update(['is_active' => $is_active]);
            DB::commit();
            
            DB::commit();
            return redirect(route('department-admin-archived'))->with('messageSuccess', 'Khôi phục thành công');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect(route('department-admin-archived'))->with('messageFail', 'Khôi phục thất bại');
        }
    }
}
