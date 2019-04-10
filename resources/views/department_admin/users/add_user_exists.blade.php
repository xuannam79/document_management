@extends('layouts.user.master')
@section('title')
    Thêm Thành Viên
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thêm Thành Viên</h6>
                </div>
                <div class="warning">
                    <p><strong>Ghi Chú!</strong> Thêm Nhanh chỉ áp dụng cho những thành viên đã được thêm vào hệ thống nhưng chưa được thêm vào đơn vị </p>
                </div>
                @include('common.errors')
                <div class="row" style="text-align: left;">
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['method'=>'POST', 'route'=>'users.exists', 'files' => true]) !!}
                                <div class="form-group" style="width: 35%;margin-left: 2%">
                                    {!! Form::text('search', '', ['class'=>'form-control live-search-box', 'placeholder'=>' Tìm kiếm thành viên... ']) !!}
                                </div>
                                <div class="col-lg-5 col-sm-5 col-xs-12 float-left">
                                    {!! Form::select('live-search-list', $listUsers, '', ['id'=>'multiselect', 'class'=>'form-control', 'size'=>'8', 'multiple'=>'multiple']) !!}
                                </div>

                                <div class="multiselect-controls col-lg-2 col-sm-2 col-xs-12 float-left">
                                    {!! Form::button('<i class="fa fa-forward"></i>', ['id'=>'multiselect_rightAll', 'class'=>'btn btn-block']) !!}
                                    {!! Form::button('<i class="fa fa-chevron-right"></i>', ['id'=>'multiselect_rightSelected', 'class'=>'btn btn-block']) !!}
                                    {!! Form::button('<i class="fa fa-chevron-left"></i>', ['id'=>'multiselect_leftSelected', 'class'=>'btn btn-block']) !!}
                                    {!! Form::button('<i class="fa fa-backward"></i>', ['id'=>'multiselect_leftAll', 'class'=>'btn btn-block']) !!}
                                </div>

                                <div class="col-lg-5 col-sm-5 col-xs-12 float-left">
                                    {!! Form::select('departments[]', [], '', ['id'=>'multiselect_to', 'class'=>'form-control', 'size'=>'8', 'multiple'=>'multiple']) !!}
                                </div>
                                {!! Form::submit("Thêm", ['class' => 'btn btn-primary mt-4 pr-4 pl-4']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
