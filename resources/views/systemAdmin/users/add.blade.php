@extends('layouts.systemAdmin.master')
@section('title')
    Quản lý thanh vien
@endsection
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-6 col-ml-12">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['method'=>'POST', 'enctype'=>'multipart/form-data', 'route'=>'users.store']) !!}
                                    {!! Form::label('email', "Email") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => "Nhập Email", 'id' => 'email']) !!}
                                        </div>
                                    </div>
                                    {!! Form::label('password', "Mật Khẩu") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => "Nhập Mật Khẩu", 'id' => 'password']) !!}
                                        </div>
                                    </div>
                                    {!! Form::label('name', "Tên Thành Viên") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => "Nhập  tên thành viên", 'id' => 'name']) !!}
                                        </div>
                                    </div>
                                    {!! Form::label('birth_date', "Ngày Sinh") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {{ Form::date('birth_date', \Carbon\Carbon::now(), array('class' => 'form-control')) }}
                                       </div>
                                    </div>
                                    {!! Form::label('gender', "Giới Tính") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {!! Form::select('gender', [1 => 'Nam',2 => 'Nu'], ['class' => 'form-control', 'id' => 'gender']) !!}
                                        </div>
                                    </div>
                                    {!! Form::label('address', "Địa Chỉ") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {!! Form::text('address', '', ['class' => 'form-control', 'placeholder' => "Nhập địa chỉ", 'id' => 'address']) !!}
                                        </div>
                                    </div>
                                    {!! Form::label('phone', "Số Điện Thoại") !!}
                                    <label for="exampleInputEmail1">Số Điện Thoại</label>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {!! Form::text('phone', '', ['class' => 'form-control', 'placeholder' => "Nhập số điện thoại", 'id' => 'phone']) !!}
                                        </div>
                                    </div>
                                    {!! Form::submit("gui", ['class' => 'btn btn-primary mt-4 pr-4 pl-4']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
