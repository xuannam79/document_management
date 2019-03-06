@extends('layouts.systemAdmin.master')
@section('title')
    Quản lý phòng ban
@endsection
@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open([
                                        'method'=>'POST',
                                        'route'=>'department.store'
                                        ]) !!}
                                {!! Form::label('nameDepartment', 'Tên phòng ban') !!}
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        {!! Form::text('name', '', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Nhập tên phòng ban']) !!}
                                    </div>
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
