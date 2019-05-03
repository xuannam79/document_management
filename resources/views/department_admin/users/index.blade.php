@extends('layouts.user.master')
@section('title')
    Danh Sách Thành Viên
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('common.errors')
        <div class="col-lg-12 col-ml-12">
            <div class="card-header py-3" style="margin-bottom: 5px;">
                <h6 class="m-0 font-weight-bold text-primary">Danh Sách Thành Viên</h6>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-primary" style="float:left;">Thêm</a>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th width="20%">Tên đầy đủ</th>
                    <th width="20%">Email</th>
                    <th width="10%">Phone</th>
                    <th width="20%">Địa Chỉ</th>
                    <th width="5%">Trạng thái</th>
                    <th width="10%">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departmentUser as $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->address }}</td>
                        <td class="frm-align">
                            @if($value->is_active != 0)
                                <span class="badge badge-success" style="background-color: #28a745">Khả dụng</span>
                            @else
                                <span class="badge badge-pill badge-warning" style="background-color: #dc3545">Không khả dụng</span>
                            @endif
                        </td>
                        <td class="frm-align">
                            <a href="{{ route('users.show',$value->user_id) }}" class="text-warning" style="margin-right: 8px;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8"  onclick='submitForm("delete-department" + {{$value->user_id}});'><i class="fa fa-trash"></i></a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',$value->user_id], 'id'=>'delete-department'.$value->user_id]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('users.archive') }}" class="btn btn-warning" style="float: right;margin-top: 10px;margin-right: 16px"><i class="fa fa-trash" style="color:white"></i></a>
</div>
@endsection
