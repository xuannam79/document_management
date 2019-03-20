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
                                    'route'=>['department.update', $department->id]
                                    ]) !!}
                            {!! Form::label('nameDepartment', 'Tên phòng ban') !!}
                            <div class="form-group">
                                    {!! Form::text('name', $department->name, [
                                        'class'=>'form-control',
                                        'placeholder'=>'Nhập tên phòng ban',
                                        'required']) !!}
                            </div>
                            {!! Form::submit('Sửa', [
                                'class'=>'btn btn-primary mt-4 pr-4 pl-4']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
