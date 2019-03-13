<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Models\DepartmentUser;
use App\Models\Position;
use App\Models\User;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users;

class ManageUser extends Controller
{
    public function index()
    {
        $depuser = DB::table('users')->join('department_users', 'users.id', '=', 'department_users.user_id')->get();
        $position = Position::pluck('name', 'id');
        $department = Department::pluck('name', 'id');

        return view('system_admin.users.index', compact( 'position', 'department', 'depuser'));
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
    public function store(Users $request)
    {
        $input = $request->all();
        $input['avatar'] = $this->save_picture($input);
        User::create($input);
        $id = DB::table('users')->select('id')->where('email', $input['email'])->first();
        DB::table('department_users')->insert(['user_id' => $id->id, 'start_date' => Carbon::now(),'end_date' => $input['end_date']]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajaxdp(Request $request, $id_dp){
        $input = $request->all();
        //dd($input);
        DB::table('department_users')->where('user_id', $id_dp)->update(['department_id' => $input['depart']]);

        return redirect()->route('users.index');
    }

    public function ajaxps(Request $request, $id_dp){
        $input = $request->all();
        DB::table('department_users')->where('user_id', $id_dp)->update(['position_id' => $input['positions']]);

        return redirect()->route('users.index');
    }

    public function save_picture($input){
        if(isset($input['avatar']))
        {
            $file = $input['avatar'];
            $fileex = $input['avatar']->getClientOriginalExtension();
            $namenew = 'avatar-'.time().'.'.$fileex;
            $path = public_path('images/avatar');
            $input['avatar'] = $namenew;
            $file->move($path, $namenew);
            return $namenew;
        }
        else {
            $namenew = 'noimg.png';
            return $namenew;
        }
    }

    public function show($id)
    {
        try
        {
            $user = DB::table('users')->join('department_users', 'users.id', '=', 'department_users.user_id')->where('user_id',$id)->first();

            return view('system_admin.users.edit', compact('user'));
        }
        catch (Exception $exception)
        {
            return redirect()->back()->with('msgFail', "loi nhap");
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

    public function ajaxemail(){
        $user = User::all();
        return response()->json($user);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Users $request, $id)
    {
        $input = $request->all();
        $input['avatar'] = $this->save_picture($input);
        User::find($id)->update($input);
        DB::table('department_users')->where('user_id', $id)->update(['start_date' => Carbon::now(),'end_date' => $input['end_date']]);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $user = User::findOrFail($id);
            DepartmentUser::where('user_id',$user->id)->delete();
            $user->delete();

            return redirect()->route('users.index')->with('messageD', 'Xoa Thanh Cong');
        }
        catch (Exception $exception)
        {
            return redirect()->back()->with('messageD', 'Xoa That Bai');
        }
    }
}
