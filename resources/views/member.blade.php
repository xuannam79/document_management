@extends('layouts.user.master')
@section('title')
    Danh Sách Thành Viên Của {{ $departments }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                @include('common.errors')
                <div class="card-header py-3" style="margin-bottom: 5px;">
                    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Thành Viên Trong Đơn Vị</h6>
                </div>
                <table id="example" class="table table-striped table-bordered" style="width:100%;">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Giới tính</th>
                        <th>Chức vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $value)
                        <tr>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ ($value->gender == config('setting.gender.male'))? "Nam":"Nữ"  }}</td>
                            <td>{{ $value->position_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
