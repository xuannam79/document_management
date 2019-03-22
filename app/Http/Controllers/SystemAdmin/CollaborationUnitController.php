<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SystemAdmin\CollaborationUnitEditRequest;
use App\Http\Requests\SystemAdmin\CollaborationUnitRequest;
use App\Models\CollaborationUnit;

class CollaborationUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collaborationUnits = CollaborationUnit::where("is_active", config('setting.active.is_active'))->get();

        return view("system_admin.collaboration_unit.index", compact("collaborationUnits"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('system_admin.collaboration_unit.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CollaborationUnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollaborationUnitRequest $request)
    {
        try {
            $input = $request->all();
            $input['is_active'] = config('setting.active.is_active');
            $result = CollaborationUnit::create($input);

            if($result){

                return redirect(route('collaboration-unit.index'))->with('alert', 'Thêm thành công');
            } else {

                return redirect(route('collaboration-unit.index'))->with('alert', 'Thêm thất bại, vui lòng kiểm tra lại');
            }
        } catch (Exception $e) {

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
        $collaborationUnit = CollaborationUnit::findOrFail($id);

        return view('system_admin.collaboration_unit.edit', compact('collaborationUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CollaborationUnitRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollaborationUnitEditRequest $request, $id)
    {
        try {
            $dataUpdate = $request->only('name');
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

        return view('system_admin.collaboration_unit.archive', compact('collaborationUnits'));
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
