@extends('layouts.user.master')
@section('title')
    Thêm đơn vị liên kết
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm Đơn Vị Liên Kết</h6>
            </div>
            @include('common.errors')
            <div class="row" style="text-align: left;">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open([
                                        'method'=>'POST',
                                        'route'=>'collaboration-unit.store'
                                        ]) !!}
                                {!! Form::label('collaboration-unit', 'Tên đơn vị liên kết') !!}
                                <div class="form-group">
                                        {!! Form::text('name', '', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Nhập tên đơn vị liên kết']) !!}
                                </div>
                                {!! Form::label('collaboration-unit', 'Số điện thoại') !!}
                                <div class="form-group">
                                        {!! Form::text('phone_number', '', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Nhập số điện thoại']) !!}
                                </div>
                                {!! Form::label('collaboration-unit', 'Email') !!}
                                <div class="form-group">
                                        {!! Form::text('email', '', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Nhập email']) !!}
                                </div>
                                {!! Form::label('collaboration-unit', 'Địa chỉ') !!}
                                <div class="form-group">
                                        {!! Form::text('address', '', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Nhập địa chỉ']) !!}
                                </div>
                                {!! Form::label('collaboration-unit', 'Mô tả') !!}
                                <div class="form-group">
                                        {!! Form::textarea('description', '', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Nhập mô tả',
                                            'rows' => 4,
                                            'cols' => 54,
                                            'style' => 'resize:none']) !!}
                                </div>
                                {!! Form::submit('Thêm', [
                                    'class'=>'btn btn-primary mt-4 pr-4 pl-4']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
