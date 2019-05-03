@extends('layouts.user.master')
@section('title')
    Thành Viên Đã Bị Xóa
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="card-header py-3" style="margin-bottom: 5px;">
                    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Thành Viên Đã Bị Xóa</h6>
                </div>
                <a href="{{ route('users.index') }}" class="btn btn-primary" style="float:left;}">Quay Lại</a>
                @include('common.errors')
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th width="20%">ID</th>
                        <th width="30%">Tên đầy đủ</th>
                        <th width="30%">Ảnh</th>
                        <th width="20%">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departmentUser as $key)
                        <tr>
                            <td>{{ $key->id }}</td>
                            <td>{{ $key->name }}</td>
                            <td><a href="/images/avatar/{{$key->avatar}}" ><img src="/images/avatar/{{ $key->avatar }}" class="img-preview2"></a></td>
                            <td style="text-align: center;vertical-align: middle;">
                                {!!Form::open(["method" => "PUT", "route" => ["users.archive.restore", $key->id ], "id" => "restoreArchive".$key->id])!!}
                                <a href="javascript:void(0)" class="text-success data-delete frm-margin-left-8" onclick="restoreArchivedData('restoreArchive'+{{$key->id}})" title="Khôi phục">
                                    <i class="fa fa-trash-restore-alt"></i>
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
