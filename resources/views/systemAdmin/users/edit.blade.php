@extends('layouts.systemAdmin.master')
@section('title')
    Sửa Thành viên
@endsection
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-6 col-ml-12">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @include('common.errors')
                                {!! Form::open(['method'=>'PUT', 'files' => true, 'route'=>['users.update',$user->user_id]]) !!}
                                    {!! Form::label('email', "Email") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => "Nhập Email", 'id' => 'email', 'required' => 'required', 'pattern' => config('setting.patter_email'),  'title' => 'Phía trước dấu @ phải có ít nhất một kí tự và phía sau dấu @ là tối đa 2 đuôi tên miền.']) !!}
                                        </div>
                                    </div>
                                    {!! Form::label('password', "Mật Khẩu") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => "Nhập Mật Khẩu", 'id' => 'password', 'required' => 'required', 'pattern' => '(?=.*\d)(?=.*[a-z]).{6,}',  'title' => 'Mật khẩu ít nhất có 6 kí tự bao gồm chữ và số']) !!}
                                        </div>
                                    </div>
                                    {!! Form::label('name', "Tên Thành Viên") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => "Nhập  tên thành viên", 'id' => 'name', 'required' => 'required', 'pattern' => config('setting.patter_fullname'),  'title' => 'Họ tên chỉ bao gồm chữ cái và phải tối thiểu 6 kí tự']) !!}
                                        </div>
                                    </div>
                                    {!! Form::label('birth_date', "Ngày Sinh") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {{ Form::date('birth_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'min' => \Carbon\Carbon::now()->format('Y-m-d')]) }}
                                        </div>
                                    </div>
                                    {!! Form::label('gender', "Giới Tính") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {!! Form::select('gender' , [1 => 'Nam',2 => 'Nữ'], $user->gender, ['class' => 'form-control', 'id' => 'gender']) !!}
                                        </div>
                                    </div>
                                    {!! Form::label('avatar', "Ảnh Đại Diện") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <img class="img-preview" id="img-preview"/>
                                            {!! Form::file('avatar',['class' => 'form-control-file', 'id' => 'avatar'])  !!}
                                        </div>
                                    </div>
                                    {!! Form::label('address', "Địa Chỉ") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {!! Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => "Nhập địa chỉ", 'id' => 'address', 'required' => 'required', 'pattern' => '[a-zA-Z0-9 /@#$%&]+',  'title' => 'địa chỉ bao gồm chữ và số']) !!}
                                        </div>
                                    </div>
                                    {!! Form::label('phone', "Số Điện Thoại") !!}
                                    <label for="exampleInputEmail1">Số Điện Thoại</label>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => "Nhập số điện thoại", 'id' => 'phone', 'required' => 'required', 'pattern' => '[0][0-9]{9}',  'title' => 'số điện thoại chỉ gồm số và bắt đầu bằng số 0 , gồm 10 số.']) !!}
                                        </div>
                                    </div>
                                    {!! Form::label('birth_date', "Ngày Hết Hạn Tài Khoản") !!}
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {{ Form::date('end_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'min' => \Carbon\Carbon::now()->format('Y-m-d')]) }}
                                        </div>
                                    </div>
                                    {!! Form::submit("Lưu", ['class' => 'btn btn-primary mt-4 pr-4 pl-4']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
