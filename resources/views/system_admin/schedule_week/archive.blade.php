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
                            <td class="frm-align"><span class="badge badge-pill badge-success">Không khả dụng</span></td>
                            <td class="frm-align">
                                {!!Form::open(['method' => 'PUT', 'route' => ['schedule-restore', $schedule->id ], 'id' => 'schedule-restore'.$schedule->id])!!}
                                <a href="javascript:void(0)" class="text-success data-delete frm-margin-left-8" onclick="restoreArchivedData('schedule-restore' + {{$schedule->id}})" title="Khôi phục">
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
