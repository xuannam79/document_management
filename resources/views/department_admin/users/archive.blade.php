@extends('layouts.admin.master')
@section('title')
    Thành Viên Đã Bị Xóa
@endsection
@section('content')
    <div class="container-fluid">
        @include('common.errors')
        <br />
        <br />
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh Sách Thành Viên Đã Bị Xóa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="frm-align">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên đầy đủ</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col">Phòng ban</th>
                            <th scope="col">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departmentUser as $key)
                            <tr>
                                <th scope="row">{{ $key->id }}</th>
                                <td>{{ $key->name }}</td>
                                <td>{{ ($key->gender == 1)? "Nam":"Nữ" }}</td>
                                <td><img src="/templates/admin/img/avatar/{{ $key->avatar }}" class="img-preview2"></td>


                                <td>
                                    {!! Form::open(['method'=>'POST', 'route'=>['users.ajaxps',$key->id], 'id' => 'changePosition'.$key->id]) !!}
                                    {!! Form::select('positions', $position, $key->departmentUser[0]->position_id, ['class' => 'form-control', 'disabled' => true, 'onchange' => 'changePosition('.$key->id.')']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['method'=>'POST', 'route'=>['users.ajaxdp',$key->id], 'id' => 'changeDepartment'.$key->id]) !!}
                                    {!! Form::select('depart', $department, $key->departmentUser[0]->department_id, ['class' => 'form-control', 'disabled' => true, 'onchange' => 'changeDepartment('.$key->id.')']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <ul class="d-flex" style="list-style-type: none;margin-left: -16px;">
                                        {!!Form::open(["method" => "PUT", "route" => ["users.archive.restore", $key->id ], "id" => "restoreArchive".$key->id])!!}
                                        <a href="javascript:void(0)" class="text-success data-delete frm-margin-left-8" onclick="restoreArchivedData('restoreArchive'+{{$key->id}})" title="Khôi phục">
                                            <i class="fa fa-trash-restore"></i>
                                        </a>
                                        {!!Form::close()!!}
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
