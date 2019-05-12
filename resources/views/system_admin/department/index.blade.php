@extends('layouts.admin.master')
@section('title')
    Quản lý phòng ban
@endsection
@section('content')
<div class="container-fluid">
    @include('common.errors')
    <a href="{{ route('department.create') }}" class="btn btn-primary">Thêm</a>
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
                            <th>ID</th>
                            <th>Tên bộ phận</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot class="frm-align">
                        <tr>
                            <th>ID</th>
                            <th>Tên bộ phận</th>
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
                            @if ($department->created_at == null)
                                <td class="frm-align">
                                </td>
                            @else
                                <td class="frm-align">{{ date('d-m-Y H:m:s', strtotime($department->created_at)) }}
                                </td>
                            @endif
                            <td class="frm-align"><span class="badge badge-pill badge-success">Khả dụng</span></td>
                            <td class="frm-align">
                                <a href="{{ route('department.edit', $department->id) }}" class="text-warning frm-margin-right-8">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {!!Form::open(['method'=>'DELETE', 'id'=>'delete-department'.$department->id, 'route'=>['department.destroy', $department->id], 'style'=>'display:inline'])!!}
                                <a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8" onclick='submitForm("delete-department" + {{$department->id}});'>
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
</div>
@endsection
