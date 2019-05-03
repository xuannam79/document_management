@extends('layouts.user.master')
@section('title')
    Danh Sách Biễu Mẫu
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="card-header py-3" style="margin-bottom: 5px;">
                    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Biễu Mẫu</h6>
                </div>
                <a href="{{ route('forms.create') }}" class="btn btn-primary" style="float:left;}">Thêm</a>
                @include('common.errors')
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>

                        <th width="10%">ID</th>
                        <th width="20%">Tên biễu mẫu</th>
                        <th width="20%">Tải về</th>
                        <th width="20%">Mô tả</th>
                        <th width="10%">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($forms as $form)
                        <tr>
                            <th scope="row">{{ $form->id }}</th>
                            <td>{{ $form->name }}</td>
                            <td style="text-align: left;">
                                @php
                                    $arrayFileDecode = array();
                                    if(isset($form->link)){
                                        $arrayFileDecode = json_decode($form->link);
                                    }
                                @endphp
                                <ul style=" padding: 0;">
                                @foreach($arrayFileDecode as $value)
                                    <li>
                                        <a href="{{ route('forms.download',$value) }}">{{ $value}}</a>
                                    </li>
                                @endforeach
                                </ul>
                            </td>
                            <td>{{ $form->description }}</td>
                            <td class="css-function">
                                <ul class="d-flex" style="list-style-type: none;margin-left: -25px;">
                                    <li class="mr-3">
                                        <a href="{{ route('forms.show',$form->id) }}" class="text-warning" style="margin-right: 8px;">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </li>
                                    <li><a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8"  onclick='submitForm("delete-department" + {{$form->id}});'><i class="fa fa-trash"></i></a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['forms.destroy',$form->id], 'id'=>'delete-department'.$form->id]) !!}
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <a href="{{ route('forms.archive') }}" class="btn btn-warning" style="float: right;margin-top: 10px;margin-right: 16px"><i class="fa fa-trash" style="color:white"></i></a>
    </div>
@endsection
