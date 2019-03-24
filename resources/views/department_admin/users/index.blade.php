@extends('layouts.admin.master')
@section('title')
    Quản Lý Thành Viên
@endsection
@section('content')
    <div class="container-fluid">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Thêm</a>
        @include('common.errors')
        <br />
        <br />
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách phòng ban</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="frm-align">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Đầy Đủ</th>
                                <th scope="col">Giới Tính</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Chức Vụ</th>
                                <th scope="col">Phòng Ban</th>
                                <th scope="col">Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($depuser as $key)
                            <tr>
                                <th scope="row">{{ $key->id }}</th>
                                <td>{{ $key->name }}</td>
                                <td>{{ ($key->gender == 1)? "Nam":"Nữ" }}</td>
                                <td><img src="/templates/admin/img/avatar/{{ $key->avatar }}" class="img-preview2"></td>


                                <td>
                                    {!! Form::open(['method'=>'POST', 'route'=>['users.ajaxps',$key->id], 'id' => 'form-pos'.$key->id]) !!}
                                        {!! Form::select('positions', $position, $key->departmentUser[0]->position_id, ['class' => 'form-control', 'onchange' => 'pos('.$key->id.')']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['method'=>'POST', 'route'=>['users.ajaxdp',$key->id], 'id' => 'form-dep'.$key->id]) !!}
                                        {!! Form::select('depart', $department, $key->departmentUser[0]->department_id, ['class' => 'form-control', 'onchange' => 'dep('.$key->id.')']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <ul class="d-flex" style="list-style-type: none;margin-left: -16px;">
                                        <li class="mr-3"><a href="{{ route('users.show',$key->id) }}" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                        <li><a href="javascript:void(0)" class="text-danger"  onclick='submitForm("delete-department" + {{$key->id}});'><i class="fa fa-trash"></i></a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',$key->id], 'id'=>'delete-department'.$key->id]) !!}
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
