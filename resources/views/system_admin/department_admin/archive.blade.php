@extends('layouts.admin.master')
@section('title')
    Quản lý trưởng đơn vị
@endsection
@section('content')
<div class="container-fluid">
    @include('common.errors')
    <br />
    <br />
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách trưởng đơn vị đã xóa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="frm-align">
                        <tr>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Phòng ban</th>
                            <th>Vị trí</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot class="frm-align">
                        <tr>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Phòng ban</th>
                            <th>Vị trí</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($depUsers as $depUser)
                        <tr>
                            <td class="frm-align">{{ $depUser->department_user_id }}</td>
                            <td class="frm-align">{{ $depUser->username }}</td>
                            <td class="frm-align">{{ $depUser->depname }}</td>
                            <td class="frm-align">{{ $depUser->posname }}</td>
                            <td class="frm-align">{{ $depUser->start_date }}</td>
                            @if ($depUser->end_date === null)
                                <td class="frm-align">Chưa xác định</td>
                            @else
                                <td class="frm-align">{{ $depUser->end_date }}</td>
                            @endif
                            <td class="frm-align"><span class="badge badge-pill badge-danger">Đã lưu trữ</span></td>
                            <td class="frm-align">
                                {!!Form::open(["method" => "PUT", "route" => ["department-admin-restore", $depUser->department_user_id ], "id" => "document-admin-restore".$depUser->department_user_id])!!}
                                <a href="javascript:void(0)" class="text-success data-delete frm-margin-left-8" onclick="restoreArchivedData('document-admin-restore'+{{$depUser->department_user_id}})" title="Khôi phục">
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
