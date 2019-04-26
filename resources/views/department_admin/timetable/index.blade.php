@extends('layouts.user.master')
@section('title')
    Danh Sách Thời Khóa Biểu
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="card-header py-3" style="margin-bottom: 5px;">
                    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Thời Khóa Biểu</h6>
                </div>
                <a href="{{ route('timetable.create') }}" class="btn btn-primary" style="float:left;}">Thêm</a>
                @include('common.errors')
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="20%">Tên Tiêu Đề</th>
                        <th width="20%">Tải về</th>
                        <th width="20%">Tình Trạng</th>
                        <th width="10%">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($timeTable as $timeTable)
                        <tr>
                            <th scope="row">{{ $timeTable->id }}</th>
                            <td>{{ $timeTable->name }}</td>
                            <td style="text-align: left;">
                                @php
                                    $arrayFileDecode = array();
                                    if(isset($timeTable->file_attachment)){
                                        $arrayFileDecode = json_decode($timeTable->file_attachment);
                                    }
                                @endphp
                                <ul style=" padding: 0;">
                                @foreach($arrayFileDecode as $value)
                                    <li>
                                        <a href="{{ route('forms.download',$value) }}">{{ $value}}</a>
                                    </li>
                                @endforeach
                                </ul>
                            </td>
                            <td>{{ $timeTable->description }}</td>
                            <td class="css-function">
                                <ul class="d-flex" style="list-style-type: none;margin-left: -25px;">
                                    <li class="mr-3">
                                        <a href="{{ route('timetable.show',$timeTable->id) }}" class="text-warning" style="margin-right: 8px;">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </li>
                                    <li><a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8"  onclick='submitForm("delete-timetable" + {{$timeTable->id}});'><i class="fa fa-trash"></i></a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['timetable.destroy',$timeTable->id], 'id'=>'delete-timetable'.$timeTable->id]) !!}
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
        <a href="{{ route('timetable.archive') }}" class="btn btn-warning" style="float: right;margin-top: 10px;margin-right: 16px"><i class="fa fa-trash" style="color:white"></i></a>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
