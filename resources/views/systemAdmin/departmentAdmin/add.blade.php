@extends('layouts.systemAdmin.master')
@section('title')
    Thêm admin phòng ban
@endsection
@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <!-- basic form start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập Tên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập Email">
                                </div>
                                <div class="form-group">
                                    <label for="example-date-input" class="col-form-label">Ngày sinh</label>
                                    <input class="form-control" type="date" value="2018-03-05" id="example-date-input">
                                </div>
                                <div class="form-group">
                                    <b class="text-muted mb-3 mt-4 d-block">Giới tính</b>
                                     <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" checked="" id="customRadio4" name="customRadio2" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio4">Nam</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadio5" name="customRadio2" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio5">Nữ</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ">
                                </div>
                                <button type="submit" class="btn btn-success mb-3">Thêm</button>
                                <button type="reset" class="btn btn-danger mb-3">Đặt lại</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
