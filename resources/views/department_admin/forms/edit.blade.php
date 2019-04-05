@extends('layouts.admin.master')
@section('title')
    Sửa Thành viên
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
                                {!! Form::open(['method'=>'PUT', 'files' => true, 'route'=>['forms.update',$forms->id]]) !!}
                                {!! Form::label('name', "Biểu Mẫu") !!}
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        {!! Form::text('name', $forms->name, ['class' => 'form-control', 'placeholder' => "Nhập Tên Biểu Mẫu", 'id' => 'name', 'required' => 'required']) !!}
                                    </div>
                                </div>
                                {!! Form::label('link', "File Biểu Mẫu") !!}
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <a href="{{ route('forms.download',$forms->id) }}" title="file cu">{{ $forms->link }}</a>
                                        {!! Form::file('link', ['class' => 'form-control-file', 'id' => 'link', 'required' => 'required'])  !!}                                    </div>
                                </div>
                                {!! Form::label('description', "Mô Tả") !!}
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        {!! Form::text('description', $forms->description, ['class' => 'form-control', 'placeholder' => "Nhập Mô Tả", 'id' => 'description', 'required' => 'required']) !!}
                                    </div>
                                </div>
                                {!! Form::submit("Sửa", ['class' => 'btn btn-primary mt-4 pr-4 pl-4']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
