@extends('layouts.system_admin.master')
@section('title')
    Quản lý admin phòng ban
@endsection
@section('content')
<div class="main-content-inner">
    <div class="row">
        <!-- Dark table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('department-admin.create') }}" class="btn btn-primary">Thêm</a><br><br>
                    <div class="dât-tables datatable-dark">
                        <table id="dataTable3" class="tẽt-center">
                            <thead class="tẽt-capitalize">
                                <tr>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant@gmail.com</td>
                                    <td>2008/11/28</td>
                                    <td>Nam</td>
                                    <td>08 Hà văn tính</td>
                                    <td>0980234243</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3"><a href="" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                            <li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
