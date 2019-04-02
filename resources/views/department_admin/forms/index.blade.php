@extends('layouts.admin.master')
@section('title')
    Quản Lý Biễu Mẫu
@endsection
@section('content')
    <div class="container-fluid">
        <a href="{{ route('forms.create') }}" class="btn btn-primary">Thêm</a>
        @include('common.errors')
        <br />
        <br />
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh Sách Biễu Mẫu</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="frm-align">
                        <tr>
                            <th>ID</th>
                            <th>Tên biễu mẫu</th>
                            <th>Tải về</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($forms as $key)
                            <tr>
                                <th scope="row">{{ $key->id }}</th>
                                <td>{{ $key->name }}</td>
                                <td><a href="{{ route('forms.download',$key->id) }}">{{ $key->link }}</a> </td>
                                <td>{{ $key->description }}</td>
                                <td>
                                    <ul class="d-flex" style="list-style-type: none;margin-left: -16px;">
                                        <li class="mr-3">
                                            <a href="{{ route('forms.show',$key->id) }}" class="text-warning" style="margin-right: 8px;">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </li>
                                        <li><a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8"  onclick='submitForm("delete-department" + {{$key->id}});'><i class="fa fa-trash"></i></a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['forms.destroy',$key->id], 'id'=>'delete-department'.$key->id]) !!}
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
        </div>
    </div>
@endsection
