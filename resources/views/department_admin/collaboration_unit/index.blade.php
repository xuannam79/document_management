@extends('layouts.user.master')
@section('title')
    Quản lý các đơn vị liên kết và hợp tác
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('common.errors')
        <div class="col-lg-12 col-ml-12">
            <div class="card-header py-3" style="margin-bottom: 5px;">
                <h6 class="m-0 font-weight-bold text-primary">Danh Sách Đơn Vị Liên Kết</h6>
            </div>
            <a href="{{ route('collaboration-unit.create') }}" class="btn btn-primary" style="float:left;">Thêm</a>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Tên đơn vị</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($collaborationUnits as $collaborationUnit)
                    <tr>
                        <td>{{ $collaborationUnit->name }}</td>
                        <td>{{ $collaborationUnit->phone_number }}</td>
                        <td>{{ $collaborationUnit->email }}</td>
                        <td>{{ $collaborationUnit->address }}</td>
                        <td>{{ $collaborationUnit->description }}</td>
                        <td class="frm-align"><span class="badge badge-pill badge-success">Hoạt động</span></td>
                        <td class="frm-align">
                            <a href="{{ route('collaboration-unit.edit', $collaborationUnit->id) }}" class="text-warning" style="margin-right: 8px;">
                                <i class="fa fa-edit"></i>
                            </a>
                            {!!Form::open(['method'=>'DELETE', 'id'=>'delete-collaboration-unit'.$collaborationUnit->id, 'route'=>['collaboration-unit.destroy', $collaborationUnit->id], 'style'=>'display:inline'])!!}
                            <a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8" onclick='submitForm("delete-collaboration-unit" + {{$collaborationUnit->id}});'>
                                <i class="fa fa-trash"></i>
                            </a>
                            {!!Form::close()!!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
