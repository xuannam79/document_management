<?php

namespace App\Http\Controllers\SystemAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Department\DepartmentRepositoryInterface;

class Department extends Controller
{

    protected $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->departmentRepository->all();

        return view('system_admin.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('system_admin.department.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $input = $request->only('name');
            $this->departmentRepository->create($input);
        } catch(Exception $e) {

            return redirect(route('department.create'))->with('alert', 'Thêm thất bại');
        }

        return redirect(route('department.index'))->with('alert', 'Thêm thành công');
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
        $department = $this->departmentRepository->find($id);

        return view('system_admin.department.edit', compact('department'));
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
        $department = $this->departmentRepository->find($id);

        try {
            $dataUpdate = $request->only('name');
            $result = $this->departmentRepository->update($dataUpdate, $id);

            if ($result) {

                return redirect(route('department.index'))->with('alert', 'Sửa thành công');
            }

        } catch(Exception $e) {

            return redirect(route('department.edit'))->with('alert', 'Sửa thất bại');
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
        //
    }
}
