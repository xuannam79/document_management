<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Requests\SystemAdmin\UserRequest;
use App\Models\DepartmentUser;
use App\Models\Position;
use App\Models\User;
use App\Models\Department;
use App\Uploaders\Uploader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentAdmin\UserManagementRequest;
use File;

class UserManagementController extends Controller
{
    protected $uploader;

    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function index()
    {
        $departmentUser = User::with('departmentUser')->where('is_active',config('setting.active.is_active'))->get();
//        $position = Position::pluck('name', 'id');
        $department = Department::pluck('name', 'id');

        return view('system_admin.users.index', compact( 'department', 'departmentUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system_admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserManagementRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['avatar'] = $this->uploader->saveImg($input['avatar']);
        $input['role'] = config('setting.position.secretary');
        User::create($input);
        $id = User::select('id')->where('email', $input['email'])->first();
        DB::table('department_users')->insert(['user_id' => $id->id, 'start_date' => Carbon::now(),'end_date' => $input['end_date'], 'department_id' => config('setting.department.no_department'), 'position_id' => config('setting.position.secretary')]);

        return redirect()->route('admin-users.index')->with('messageSuccess', 'Thêm Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajaxdp(Request $request, $id){
        $input = $request->all();
        DB::beginTransaction();
        try
        {
            DepartmentUser::where('user_id', $id)->update(['department_id' => $input['depart']]);
            DB::commit();

            return redirect()->route('admin-users.index')->with('messageSuccess', 'Cập Nhật Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->route('admin-users.index')->with('messageFail', 'Cập Nhật Thất Bại');
        }
    }

    public function ajaxps(Request $request, $id){
        $input = $request->all();
        DB::beginTransaction();
        try
        {
            DepartmentUser::where('user_id', $id)->update(['position_id' => $input['positions']]);
            DB::commit();

            return redirect()->route('admin-users.index')->with('messageSuccess', 'Cập Nhật Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->route('admin-users.index')->with('messageFail', 'Cập Nhật Thất Bại');
        }
    }

    public function archiveIndex(){
        $departmentUser = User::with('departmentUser')->where('is_active',config('setting.active.no_active'))->get();
        $position = Position::pluck('name', 'id');
        $department = Department::pluck('name', 'id');

        return view('system_admin.users.archive', compact( 'position', 'department', 'departmentUser'));
    }

    public function restore($id){
        DB::beginTransaction();
        try
        {
            User::find($id)->update(['is_active' => config('setting.active.is_active')]);
            DB::commit();

            return redirect()->route('admin-users.archive')->with('messageSuccess', 'Hoàn Tác Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->route('admin-users.archive')->with('messageFail', 'Hoàn Tác Thất Bại');
        }
    }

//    public function savePicture($input){
//        if(isset($input['avatar']))
//        {
//            $file = $input['avatar'];
//            $fileExtension = $input['avatar']->getClientOriginalExtension();
//            $newName = 'avatar-'.time().str_random(6).'.'.$fileExtension;
//            $path = public_path('/upload/images');
//            $input['avatar'] = $newName;
//            $file->move($path, $newName);
//            return $newName;
//        }
//    }

    public function show($id)
    {
        try
        {
            $user = User::with('departmentUser')->where('users.id',$id)->first() ;
            $department = DepartmentUser::where('user_id',$id)->first();

            return view('system_admin.users.edit', compact('user', 'department'));
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

    public function ajaxEmail(){
        $user = User::where('is_active',config('setting.active.is_active'))->where('status',config('setting.lock.no_lock'))->get();
        return response()->json($user);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserManagementRequest $request, $id)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        DB::beginTransaction();
        try
        {
            if(!isset($input['avatar'])){
                User::find($id)->update(['email' => $input['email'], 'password' => $input['password'], 'name' => $input['name'], 'birth_date' => $input['birth_date']]);
                DepartmentUser::where('user_id', $id)->update(['start_date' => Carbon::now(),'end_date' => $input['end_date']]);
            }
            else {
                $input['avatar'] = $this->uploader->saveImg($input['avatar']);
                User::find($id)->update($input);
                DepartmentUser::where('user_id', $id)->update(['start_date' => Carbon::now(),'end_date' => $input['end_date']]);
            }
            DB::commit();

            return redirect()->route('admin-users.index')->with('messageSuccess', 'Cập Nhật Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->route('admin-users.index')->with('messageFail', 'Cập Nhật Thất Bại');
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
            $user = User::findOrFail($id);
            $user->update(['is_active' => config('setting.active.no_active')]);
            DepartmentUser::where('user_id', $id)->update(['is_active' => config('setting.active.no_active')]);
            DB::commit();

            return redirect()->route('admin-users.index')->with('messageSuccess', 'Xóa Thành Công');
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            return redirect()->back()->with('messageFail', 'Xóa Thất Bại');
        }
    }
}
