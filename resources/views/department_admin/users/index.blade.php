@extends('layouts.system_admin.master')
@section('title')
    Quản Lý Thành Viên
@endsection
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Danh Sách Thành Viên</h4>
                        @include('common.errors')
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Thêm</a>
                        <div class="data-tables datatable-dark">
                                <table  id="dataTable3" class="text-center">
                                    <thead class="text-capitalize">
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
                                        <th scope="row">{{ $key->user_id }}</th>
                                        <td>{{ $key->name }}</td>
                                        <td>{{ ($key->gender == 1)? "Nam":"Nữ" }}</td>
                                        <td><img src="layouts/system_admin/images/avatar/{{ $key->avatar }}" class="img-preview2"></td>


                                        <td>
                                            {!! Form::open(['method'=>'POST', 'route'=>['users.ajaxps',$key->user_id], 'id' => 'form-pos'.$key->user_id]) !!}
                                                {!! Form::select('positions', $position, $key->position_id, ['class' => 'form-control', 'onchange' => 'pos('.$key->user_id.')']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            {!! Form::open(['method'=>'POST', 'route'=>['users.ajaxdp',$key->user_id], 'id' => 'form-dep'.$key->user_id]) !!}
                                                {!! Form::select('depart', $department, $key->department_id, ['class' => 'form-control', 'onchange' => 'dep('.$key->user_id.')']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3" style="margin-top: 10px;"><a href="{{ route('users.show',$key->user_id) }}" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                <li style="margin-top: 10px;"><a href="javascript:void(0)" class="text-danger"  onclick="deleteUser({{$key->user_id}})"><i class="ti-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',$key->user_id], 'id' => "delete-form".$key->user_id]) !!}
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
        </div>
    </div>
@endsection
