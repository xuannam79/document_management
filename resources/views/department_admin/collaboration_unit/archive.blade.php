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
                <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn vị liên kết đã xóa</h6>
            </div>
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
                        <td>{{ str_limit($collaborationUnit->description, 100) }}</td>
                        <td class="frm-align"><span class="badge badge-pill badge-danger">Đã lưu trữ</span></td>
                        <td class="frm-align">
                            {!!Form::open(["method" => "PUT", "route" => ["collaboration-unit-restore", $collaborationUnit->id ], "id" => "collaboration-unit-restore".$collaborationUnit->id])!!}
                            <a href="javascript:void(0)" class="text-success data-delete frm-margin-left-8" onclick="restoreArchivedData('collaboration-unit-restore'+{{$collaborationUnit->id}})" title="Khôi phục">
                                <i class="fa fa-trash-restore"></i>
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
