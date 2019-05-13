@extends('layouts.admin.master')
@section('title')
    Sửa Trưởng Đơn Vị
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                @include('common.errors')
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['method'=>'PUT',
                                'route'=>['department-admin.update', $depUsers->id],
                                'files' => true]) !!}
                                {!! Form::label('email', "Email") !!}
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        {!! Form::text('email', $depUsers->email, ['class' => 'form-control', 'placeholder' => "Nhập Email", 'id' => 'email', 'required' => 'required', 'pattern' => config('setting.patter_email'),  'title' => 'Phía trước dấu @ phải có ít nhất một kí tự và phía sau dấu @ là tối đa 2 đuôi tên miền.']) !!}
                                    </div>
                                </div>
                                {!! Form::label('name', "Tên Thành Viên") !!}
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        {!! Form::text('name', $depUsers->name, ['class' => 'form-control', 'placeholder' => "Nhập  Tên Thành Viên", 'id' => 'name', 'required' => 'required', 'pattern' => config('setting.patter_fullname'),  'title' => 'Họ tên chỉ bao gồm chữ cái và phải tối thiểu 6 kí tự']) !!}
                                    </div>
                                </div>
                                {!! Form::label('department_id', "Phòng ban đang ủy quyền") !!}
                                <div class="form-group">
                                   {!! Form::text('department_id', $searchDepartment['department']['name'], ['class' => 'form-control', 'readonly']) !!}
                                </div>
                                {!! Form::label('birth_date', "Ngày Sinh") !!}
                                <div class="input-group date birthday" data-date-format="dd/mm/yyyy">
                                    {!! Form::text('birth_date', (new DateTime($depUsers->birth_date))->format('d/m/Y'), ['readonly', 'class'=>'form-control', 'style'=>'background:#fff']) !!}
                                    <span class="input-group-addon"></span>
                                </div>
                                {!! Form::label('gender', "Giới Tính") !!}
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        {!! Form::select('gender' , [config('setting.gender.male') => 'Nam',config('setting.gender.female') => 'Nữ'], $depUsers->gender, ['class' => 'form-control', 'id' => 'gender']) !!}
                                    </div>
                                </div>
                                {!! Form::label('avatar', "Ảnh Đại Diện") !!}
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        @if ($depUsers->avatar == 'user-default.png')
                                            <img src="/templates/user/images/{{$depUsers->avatar}}" class="img-preview" id="img-preview"/>
                                        @else
                                            <img src="/upload/images/{{$depUsers->avatar}}" class="img-preview" id="img-preview"/>
                                        @endif
                                        {!! Form::file('avatar',['class' => 'form-control-file', 'id' => 'avatar'])  !!}
                                    </div>
                                </div>
                                {!! Form::label('address', "Địa Chỉ") !!}
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        {!! Form::text('address', $depUsers->address, ['class' => 'form-control', 'placeholder' => "Nhập Địa Chỉ", 'id' => 'address', 'required' => 'required', 'pattern' => config('setting.patter_address'),  'title' => 'địa chỉ bao gồm chữ và số']) !!}
                                    </div>
                                </div>
                                {!! Form::label('phone', "Số Điện Thoại") !!}
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        {!! Form::text('phone', $depUsers->phone, ['class' => 'form-control', 'placeholder' => "Nhập Số Điện Thoại"]) !!}
                                    </div>
                                </div>
                                {!! Form::submit("Sửa", ['class' => 'btn btn-primary mt-4 pr-4 pl-4', 'id' => 'btnAddUser']) !!}
                                <a class="btn btn-primary" data-toggle="modal" data-target="#password_modal" style="color:#fff;margin-top:1.5rem">Đặt Lại Mật Khẩu</a>
                                {!! Form::close() !!}
                                {{--    modal change password --}}
                                <div id="password_modal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Đặt Lại Mật Khẩu</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            {!! Form::open(['method'=>'POST', 'route'=>['department-changepass']]) !!}
                                            <div class="modal-body" style="text-align: left;">
                                                
                                                {!! Form::hidden('user_id', $depUsers->id, []) !!}
                                                
                                                {!! Form::label('newpassword', "Mật khẩu Mới") !!}
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        {!! Form::password('newpassword', ['class' => 'form-control', 'placeholder' => "Nhập Mật Khẩu Mới", 'id' => 'password', 'required' => 'required', 'pattern' => '(?=.*\d)(?=.*[a-z]).{6,}',  'title' => 'Mật khẩu ít nhất có 6 kí tự bao gồm chữ và số']) !!}
                                                    </div>
                                                </div>
                                                {!! Form::label('renewpassword', "Nhập Lại Mật Khẩu Mới") !!}
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        {!! Form::password('confirmpassword', ['class' => 'form-control', 'placeholder' => "Nhập Lại Mật Khẩu Mới", 'id' => 'password', 'required' => 'required', 'pattern' => '(?=.*\d)(?=.*[a-z]).{6,}',  'title' => 'Mật khẩu ít nhất có 6 kí tự bao gồm chữ và số']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::submit("Lưu Thay Đổi", ['class' => 'btn btn-primary']) !!}
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
