@extends('layouts.user.master')
@section('title')
    Danh sách ủy quyền
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('common.errors')
        <div class="col-lg-12 col-ml-12">
            <div class="card-header py-3" style="margin-bottom: 5px;">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách các thành viên được ủy quyền trong đơn vị</h6>
            </div>
            <a href="{{ route('delegacy.create') }}" class="btn btn-primary" style="float:left;">Thêm</a>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Họ và tên</th>
                        <th style="text-align: center;">Phòng ban ủy quyền</th>
                        <th style="text-align: center;">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($getUser as $user)
                    <tr>
                        <td>{{ $user->idUser }}</td>
                        <td>{{ $user->nameUser }}</td>
                        <td>{{ $getDepartment['department']['name'] }}</td>
                        <td class="frm-align">
                            {!!Form::open(['method'=>'DELETE', 'id'=>'delete-delegacy'.$user->idUser, 'route'=>['delegacy.destroy', $user->idUser], 'style'=>'display:inline'])!!}
                            <a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8" onclick='submitForm("delete-delegacy" + {{$user->idUser}});'>
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
