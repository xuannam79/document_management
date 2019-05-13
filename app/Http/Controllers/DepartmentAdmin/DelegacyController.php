<?php

namespace App\Http\Controllers\DepartmentAdmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Department;
use App\Models\DepartmentUser;

class DelegacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getDepartment = DepartmentUser::with([
            'user' => function($query) {
                $query->whereId(Auth::user()->id);
            }, 
            'department'
        ])->first()->toArray();
        $getUser = User::where('delegacy', config('setting.delegacy.department_admin'))->get();

        return view('department_admin.delegacy.index', compact('getUser', 'getDepartment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getDepartment = DepartmentUser::with([
            'user',
            'department'
        ])->where('user_id', Auth::user()->id)
        ->first()->toArray();
        $getIdDepartment = $getDepartment['department']['id'];

        $searchAdmin = DB::table('users')->join('department_users', 'users.id', '=', 'department_users.user_id')
        ->where('department_id', $getIdDepartment)
        ->where('users.id', '!=', Auth::user()->id)
        ->pluck('name', 'users.id');

        return view('department_admin.delegacy.add', compact('searchAdmin', 'getDepartment'));
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

            $getIdUser = $request->user_id;
            $checkAssign = User::select('delegacy')->whereId($getIdUser)->first();
            if ($checkAssign->delegacy == config('setting.delegacy.department_admin')) {

                return redirect(route('delegacy.create'))->with('alert', 'Người này đã được ủy quyền rồi!');                
            } else {
                $pushAssign = config('setting.delegacy.department_admin');
                User::whereId($getIdUser)->update(['delegacy' => $pushAssign]);
                DB::commit();

                return redirect(route('delegacy.index'))->with('alert', 'Thêm thành công');
            }
        } catch (Exception $e) {
            DB::rollBack();

            return redirect(route('delegacy.create'))->with('alert', 'Thêm thất bại');
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
        try {
            DB::beginTransaction();

            $deleteAssign = config('setting.delegacy.no_delegacy');
            User::whereId($id)->update(['delegacy' => $deleteAssign]);
            DB::commit();

            return redirect(route('delegacy.index'))->with('alert', 'Xóa thành công');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect(route('delegacy.create'))->with('alert', 'Xóa thất bại');
        }
    }
}
