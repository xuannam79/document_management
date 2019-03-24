@extends('layouts.admin.master')
@section('title')
    Sửa phòng ban
@endsection
@section('content')
<div class="main-content-inner">
    <div class="col-lg-6 col-ml-12">
        @include('common.errors')
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open([
                                    'method'=>'PUT',
                                    'route'=>['document-type.update', $documentType->id]
                                    ]) !!}
                            {!! Form::label('nameDocumentType', 'Tên loại văn bản') !!}
                            <div class="form-group">
                                    {!! Form::text('name', $documentType->name, [
                                        'class'=>'form-control',
                                        'placeholder'=>'Tên loại văn bản']) !!}
                            </div>
                            {!! Form::submit('Sửa', [
                                'class'=>'btn btn-primary mt-4 pr-4 pl-4']) !!}
                            {!! Form::reset('Đặt lại', [
                                'class'=>'btn btn-danger mt-4 pr-4 pl-4']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
