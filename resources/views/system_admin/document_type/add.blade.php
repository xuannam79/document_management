@extends('layouts.admin.master')
@section('title')
    Thêm loại văn bản
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
        @include('common.errors')
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open([
                                        'method'=>'POST',
                                        'route'=>'document-type.store'
                                        ]) !!}
                                {!! Form::label('nameDepartment', 'Tên loại văn bản') !!}
                                <div class="form-group">
                                        {!! Form::text('name', '', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Nhập tên loại văn bản',
                                            'required']) !!}
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
