@extends('layouts.admin.master')
@section('title')
    Quản Lý Tài Sản
@endsection
@section('content')
    <div class="container-fluid">
        <a href="{{ route('infrastructure.create') }}" class="btn btn-primary">Thêm</a>
        @include('common.errors')
        <br />
        <br />
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh Sách Tài Sản</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="frm-align">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên tài sản</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Thuộc đơn vị</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($infrastructure as $key)
                            <tr>
                                <th scope="row">{{ $key->id }}</th>
                                <td>{{ $key->name }}</td>
                                <td><img src="/upload/images/{{ $key->picture }}" class="img-preview2"></td>
                                <td>
                                    {!! Form::open(['method'=>'POST', 'route'=>['infrastructure.department',$key->id], 'id' => 'changeDepartment'.$key->id]) !!}
                                        {!! Form::select('department_id', $department, $key->department_id, ['class' => 'form-control', 'onchange' => 'changeDepartment('.$key->id.')']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td style="text-align: center">{{ $key->amount }}</td>
                                <td>
                                    <ul class="d-flex" style="list-style-type: none;margin-left: -16px;">
                                        <li class="mr-3">
                                            <a href="{{ route('infrastructure.show',$key->id) }}" class="text-warning" style="margin-right: 8px;">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </li>
                                        <li><a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8"  onclick='submitForm("delete-department" + {{$key->id}});'><i class="fa fa-trash"></i></a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['infrastructure.destroy',$key->id], 'id'=>'delete-department'.$key->id]) !!}
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
