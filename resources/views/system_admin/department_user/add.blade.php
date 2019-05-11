@extends('layouts.admin.master')
@section('title')
    Thêm nhân sự - phòng ban
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
                                        'method'=>'POST',
                                        'route'=>'department-user.store'
                                        ]) !!}
                                {!! Form::label('nameAdminDepartment', 'Chọn nhân sự - cán bộ') !!}
                                <div class="form-group">
                                    {!! Form::select('user_id', $searchAdmin, null,
                                            ['class' => 'selectpicker form-control',
                                            'data-live-search' => 'true']) !!}
                                </div>

                                {!! Form::label('nameDepartment', 'Chọn phòng ban tiếp quản') !!}
                                <div class="form-group">
                                    {!! Form::select('department_id', $searchDepartment, null,
                                            ['class' => 'selectpicker form-control',
                                            'data-live-search' => 'true']) !!}
                                </div>
                                {!! Form::label('namePosition', 'Chọn chức vụ tiếp quản') !!}
                                <div class="form-group">
                                    {!! Form::select('position_id', $searchPosition, null,
                                            ['class' => 'selectpicker form-control',
                                            'data-live-search' => 'true']) !!}
                                </div>
                                {!! Form::label('date-start', 'Chọn ngày bắt đầu tiếp quản') !!}
                                <div  class="input-group date" data-date-format="dd/mm/yyyy">
                                    {!! Form::text('start_date', '', ['readonly', 'class'=>'form-control date', 'required', 'id'=>'date_start', 'data-date-format'=>'dd/mm/yyyy']) !!}
                                    <span class="input-group-addon"></span>
                                </div>
                                {!! Form::label('date-end', 'Chọn ngày kết thúc') !!}
                                <div  class="input-group date" data-date-format="dd/mm/yyyy">
                                    {!! Form::text('end_date', '', ['readonly', 'class'=>'form-control date', 'id'=>'date_end', 'data-date-format'=>'dd/mm/yyyy']) !!}
                                    <span class="input-group-addon"></span>
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
