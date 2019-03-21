@extends('layouts.admin.master')
@section('title')
    Quản lý phòng ban
@endsection
@section('content')
<div class="container-fluid">
    @include('common.errors')
    <br />
    <br />
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách phòng ban đã xóa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="frm-align">
                        <tr>
                            <th>ID</th>
                            <th>Tên loại văn bản</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot class="frm-align">
                        <tr>
                            <th>ID</th>
                            <th>Tên loại văn bản</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($departments as $department)
                        <tr>
                            <td class="frm-align">{{ $department->id }}</td>
                            <td>{{ $department->name }}</td>
                            <td class="frm-align">{{ $department->created_at }}</td>
                            <td class="frm-align"><span class="badge badge-pill badge-danger">Đã lưu trữ</span></td>
                            <td class="frm-align">
                                {!!Form::open(['method' => 'PUT', 'route' => ['department-restore', $department->id ], 'id' => 'department-restore'.$department->id])!!}
                                <a href="javascript:void(0)" class="text-success data-delete frm-margin-left-8" onclick="restoreArchivedData('department-restore' + {{$department->id}})" title="Khôi phục">
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
