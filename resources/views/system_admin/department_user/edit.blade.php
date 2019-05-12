@extends('layouts.admin.master')
@section('title')
    Chuyển đổi nhân sự - phòng ban
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
                            {!! Form::open([
                                        'method'=>'PUT',
                                        'route'=>['department-user.update', $depUsers->id]
                                        ]) !!}
                                {!! Form::label('name', 'Họ và tên') !!}
                                <div class="form-group">
                                    {!! Form::text('name', $depUsers->name, ['class' => 'form-control', 'readonly']) !!}
                                </div>
                                {!! Form::label('currentDepartment', 'Phòng ban hiện tại') !!}
                                <div class="form-group">
                                    {!! Form::text('current_department', $currentDepartment['department']['name'], ['class' => 'form-control', 'readonly']) !!}
                                </div>

                                {!! Form::label('department_id', 'Chọn phòng ban tiếp quản') !!}
                                <div class="form-group">
                                    {!! Form::select('department_id', $searchDepartment, $depUsers->department_id,
                                            ['class' => 'selectpicker form-control',
                                            'data-live-search' => 'true']) !!}
                                </div>
                                {!! Form::label('position_id', 'Chọn chức vụ tiếp quản') !!}
                                <div class="form-group">
                                    {!! Form::select('position_id', $searchPosition, $depUsers->position_id,
                                            ['class' => 'selectpicker form-control',
                                            'data-live-search' => 'true']) !!}
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
</div>
@endsection
