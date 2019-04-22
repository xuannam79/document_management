@extends('layouts.user.master')
@section('title')
    Danh Sách Thành Viên
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="card-header py-3" style="margin-bottom: 5px;">
                    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Thành Viên</h6>
                </div>
                <a href="{{ route('users.create') }}" class="btn btn-primary" style="float:left;}">Thêm</a>
                @include('common.errors')
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
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
                            <td>{{ $key->user_id }}</td>
                            <td>{{ $key->name }}</td>
                            <td><a href="/images/avatar/{{$key->avatar}}" ><img src="/images/avatar/{{ $key->avatar }}" class="img-preview2"></a></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <ul class="d-flex" style="list-style-type: none">
                                    <li class="mr-3">
                                        <a href="{{ route('users.show',$key->user_id) }}" class="text-warning" style="margin-right: 8px;">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </li>
                                    <li><a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8"  onclick='submitForm("delete-department" + {{$key->user_id}});'><i class="fa fa-trash"></i></a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',$key->user_id], 'id'=>'delete-department'.$key->user_id]) !!}
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
        <a href="{{ route('users.archive') }}" class="btn btn-warning" style="float: right;margin-top: 10px;margin-right: 16px"><i class="fa fa-trash" style="color:white"></i></a>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
