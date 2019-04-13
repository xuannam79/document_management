@extends('layouts.admin.master')
@section('title')
    Quản Lý Thành Viên
@endsection
@section('content')
    <div class="container-fluid">
        <a href="{{ route('admin-users.create') }}" class="btn btn-primary">Thêm</a>
        @include('common.errors')
        <br />
        <br />
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh Sách Thành Viên</h6>
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
                                <th scope="col">Phòng ban</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($departmentUser as $key)
                            <tr>
                                <th scope="row">{{ $key->id }}</th>
                                <td>{{ $key->name }}</td>
                                <td>{{ ($key->gender == config('setting.gender.male'))? "Nam":"Nữ" }}</td>
                                <td><a href="/images/avatar/{{ $key->avatar }}"><img src="/images/avatar/{{ $key->avatar }}" class="img-preview2"></a></td>
                                <td>
                                    {!! Form::open(['method'=>'POST', 'route'=>['admin-users.ajaxdp',$key->id], 'id' => 'changeDepartment'.$key->id]) !!}
                                        {!! Form::select('depart', $department, $key->departmentUser[0]->department_id, ['class' => 'form-control', 'onchange' => 'changeDepartment('.$key->id.')']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <ul class="d-flex" style="list-style-type: none;margin-left: -16px;">
                                        <li class="mr-3">
                                            <a href="{{ route('admin-users.show',$key->id) }}" class="text-warning" style="margin-right: 8px;">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </li>
                                        <li><a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8"  onclick='submitForm("delete-department" + {{$key->id}});'><i class="fa fa-trash"></i></a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin-users.destroy',$key->id], 'id'=>'delete-department'.$key->id]) !!}
                                            {!! Form::close() !!}
                                        </li>
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
