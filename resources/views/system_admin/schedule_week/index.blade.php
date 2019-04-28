@extends('layouts.admin.master')
@section('title')
    Quản lý lịch tuần của trường
@endsection
@section('content')
<div class="container-fluid">
    <a href="{{ route('schedule-admin.create') }}" class="btn btn-primary">Thêm</a>
    @include('common.errors')
    <br />
    <br />
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách lịch tuần của trường</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="frm-align">
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedule as $schedule)
                        <tr>
                            <td class="frm-align">{{ $schedule->id }}</td>
                            <td>{{ $schedule->title }}</td>
                            <td class="frm-align">{{ $dateConvert = date('d-m-Y', strtotime($schedule->start)) }}</td>
                            <td class="frm-align">{{ $dateConvert = date('d-m-Y', strtotime($schedule->end)) }}</td>
                            <td class="frm-align"><span class="badge badge-pill badge-success">Khả dụng</span></td>
                            <td class="frm-align">
                                <a href="{{ route('schedule-admin.show', $schedule->id) }}" class="text-warning frm-margin-right-8">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {!!Form::open(['method'=>'DELETE', 'id'=>'delete-department'.$schedule->id, 'route'=>['schedule-admin.destroy', $schedule->id], 'style'=>'display:inline'])!!}
                                <a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8" onclick='submitForm("delete-department" + {{$schedule->id}});'>
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
