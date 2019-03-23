@extends('layouts.admin.master')
@section('title')
    Quản lý các đơn vị liên kết
@endsection
@section('content')
<div class="container-fluid">
    @include('common.errors')
    <br />
    <br />
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn vị liên kết đã xóa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="frm-margin-right-8">
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
                    <tfoot class="frm-margin-right-8">
                        <tr>
                            <th>Tên đơn vị</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($collaborationUnits as $collaborationUnit)
                        <tr>
                            <td>{{ $collaborationUnit->name }}</td>
                            <td>{{ $collaborationUnit->phone_number }}</td>
                            <td>{{ $collaborationUnit->email }}</td>
                            <td>{{ $collaborationUnit->address }}</td>
                            <td>{{ str_limit($collaborationUnit->description, 100) }}</td>
                            <td style="text-align: center;"><span class="badge badge-pill badge-danger">Đã lưu trữ</span></td>
                            <td style="text-align: center;">
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
</div>
@endsection
