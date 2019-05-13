<?php

namespace App\Http\Controllers\DepartmentAdmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\SystemAdmin\CollaborationUnitEditRequest;
use App\Http\Requests\SystemAdmin\CollaborationUnitRequest;
use App\Models\CollaborationUnit;
use App\Models\DepartmentUser;
use App\Models\User;
use App\Models\Department;

class CollaborationUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getDepartment = DepartmentUser::with([
            'user',
            'department'
        ])->where('user_id', Auth::user()->id)
        ->first()->toArray();
        $getIdDepartment = $getDepartment['department']['id'];

        $collaborationUnits = CollaborationUnit::where('department_id', $getIdDepartment)
            ->where('is_active', config('setting.active.is_active'))->get();

        return view("department_admin.collaboration_unit.index", compact("collaborationUnits"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department_admin.collaboration_unit.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollaborationUnitRequest $request)
    {
        try {
            DB::beginTransaction();
            $getDepartment = DepartmentUser::with([
                'user',
                'department'
            ])->where('user_id', Auth::user()->id)
            ->first()->toArray();
            $getIdDepartment = $getDepartment['department']['id'];

            $input = $request->all();
            $input['is_active'] = config('setting.active.is_active');
            $input['department_id'] = $getIdDepartment;
            $result = CollaborationUnit::create($input);
            if($result){
                DB::commit();

                return redirect(route('collaboration-unit.index'))->with('alert', 'Thêm thành công');
            } else {
                DB::rollBack();
                
                return redirect(route('collaboration-unit.index'))->with('alert', 'Thêm thất bại, vui lòng kiểm tra lại');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect(route('collaboration-unit.create'))->with('alert', 'Thêm thất bại');
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
        try {
            $collaborationUnit = CollaborationUnit::findOrFail($id);

            return view('department_admin.collaboration_unit.edit', compact('collaborationUnit'));
        } catch (Exception $e) {
            return redirect(route('collaboration-unit.index'))->with('alert', 'Không tìm thấy ID');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollaborationUnitEditRequest $request, $id)
    {
        try {
            $dataUpdate = $request->only('name', 'phone_number', 'email', 'address', 'description');
            $result = CollaborationUnit::whereId($id)->update($dataUpdate);

            if ($result) {

                return redirect(route('collaboration-unit.index'))->with('alert', 'Sửa thành công');
            } else {

                return redirect(route('collaboration-unit.index'))->with('alert', 'Dữ liệu không được sửa đổi');
            }

        } catch (Exception $e) {

            return redirect(route('collaboration-unit.edit'))->with('alert', 'Sửa thất bại');
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
            $deactive = config('setting.active.no_active');
            $result = CollaborationUnit::whereId($id)->update(['is_active' => $deactive]);

            if ($result) {

                return redirect(route('collaboration-unit.index'))->with('alert', 'Xóa thành công');
            } else {

                return redirect(route('collaboration-unit.index'))->with('alert', 'Xóa thất bại');
            }

        } catch (Exception $e) {

            return redirect(route('collaboration-unit.index'))->with('alert', 'Xóa thất bại');
        }
    }

    public function archive()
    {
        $collaborationUnits = CollaborationUnit::where("is_active", config('setting.active.no_active'))->get();

        return view('department_admin.collaboration_unit.archive', compact('collaborationUnits'));
    }

    public function restore($id)
    {
        try {
            $active = config('setting.active.is_active');
            $result = CollaborationUnit::whereId($id)->update(['is_active' => $active]);

            if ($result) {

                return redirect(route('collaboration-unit-archived'))->with('alert', 'Khôi phục thành công');
            } else {

                return redirect(route('collaboration-unit-archived'))->with('alert', 'Khôi phục thất bại');
            }

        } catch (Exception $e) {

            return redirect(route('collaboration-unit-archived'))->with('alert', 'Khôi phục thất bại');
        }
    }
}
