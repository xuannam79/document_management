@extends('layouts.admin.master')
@section('title')
    Quản lý loại văn bản
@endsection
@section('content')
<div class="container-fluid">
    <a href="{{ route('document-type.create') }}" class="btn btn-primary">Thêm</a>
    @include('common.errors')
    <br />
    <br />
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách các loại văn bản</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="frm-align">
                        <tr>
                            <th>ID</th>
                            <th>Tên loại văn bản</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot class="frm-align">
                        <tr>
                            <th>ID</th>
                            <th>Tên loại văn bản</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($documentTypes as $documentType)
                        <tr>
                            <td class="frm-align">{{ $documentType->id }}</td>
                            <td>{{ $documentType->name }}</td>
                            <td class="frm-align">{{ $documentType->created_at }}</td>
                            <td class="frm-align"><span class="badge badge-pill badge-success">Khả dụng</span></td>
                            <td class="frm-align">
                                <a href="{{ route('document-type.edit', $documentType->id) }}" class="text-warning frm-margin-right-8">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {!!Form::open(['method'=>'DELETE', 'id'=>'delete-document-type'.$documentType->id, 'route'=>['document-type.destroy', $documentType->id], 'style'=>'display:inline'])!!}
                                <a href="javascript:void(0)" class="text-danger data-delete frm-margin-left-8" onclick='submitForm("delete-document-type" + {{$documentType->id}});'>
                                    <i class="fa fa-trash"></i>
                                </a>
                                {!!Form::close()!!}
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
