@extends('layouts.user.master')
@section('title')
    Danh sách các đơn vị liên kết
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('common.errors')
        <div class="col-lg-12 col-ml-12">
            <div class="card-header py-3" style="margin-bottom: 5px;">
                <h6 class="m-0 font-weight-bold text-primary">Danh Sách Các Đơn Vị Liên Kết</h6>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Tên đơn vị</th>
                        <th style="text-align: center;">Số điện thoại</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($collaborationUnits as $collaborationUnit)
                    <tr>
                        <td>{{ $collaborationUnit->id }}</td>
                        <td>{{ $collaborationUnit->name }}</td>
                        <td>{{ $collaborationUnit->phone_number }}</td>
                        <td>{{ $collaborationUnit->email }}</td>
                        <td>{{ $collaborationUnit->address }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
