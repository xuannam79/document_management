@extends('layouts.user.master')
@section('title')
    Danh Sách Thành Viên
@endsection
@section('content')
    <div class="container">
        <div id="cards-wrapper" class="cards-wrapper row">
            <div class="container-fluid">
                <a href="{{ route('users.create') }}" class="btn btn-primary" style="float:left;}">Thêm</a>
                <a href="{{ route('add.user.exists') }}" class="btn btn-primary" style="float:right;}">Thêm Nhanh</a>
                @include('common.errors')
                <br />
                <br />
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Thành Viên</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="frm-align">
                                <tr>
                                    <th width="20%">ID</th>
                                    <th width="30%">Tên đầy đủ</th>
                                    <th width="30%">Ảnh</th>
                                    <th width="20%">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departmentUser as $key)
                                    <tr>
                                        <td>{{ $key->id }}</td>
                                        <td>{{ $key->name }}</td>
                                        <td><a href="/images/avatar/{{$key->avatar}}" ><img src="/images/avatar/{{ $key->avatar }}" class="img-preview2"></a></td>
                                        <td>
                                            <ul class="d-flex" style="list-style-type: none">
                                                <li class="mr-3">
                                                    <a href="{{ route('users.show',$key->id) }}" class="text-warning" style="margin-right: 8px;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                <li><a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8"  onclick='submitForm("delete-department" + {{$key->id}});'><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',$key->id], 'id'=>'delete-department'.$key->id]) !!}
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
        </div>
    </div>
@endsection
