@extends('layouts.admin.master')
@section('title')
    Quản lý loại văn bản
@endsection
@section('content')
<div class="container-fluid">
    @include('common.errors')
    <br />
    <br />
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách loại văn bản đã xóa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center;">
                        <tr>
                            <th>ID</th>
                            <th>Tên loại văn bản</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
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
                            <td>{{ $documentType->id }}</td>
                            <td>{{ $documentType->name }}</td>
                            <td>{{ $documentType->created_at }}</td>
                            <td style="text-align: center;"><span class="badge badge-pill badge-danger">Đã lưu trữ</span></td>
                            <td style="text-align: center;">
                                {!!Form::open(["method" => "PUT", "route" => ["document-type-restore", $documentType->id ], "id" => "document-type-restore"])!!}
                                <a href="javascript:void(0)" class="text-success data-delete" style="margin-left: 8px" onclick="restoreArchivedData('document-type-restore')" title="Khôi phục">
                                    <i class="fa fa-trash-restore"></i>
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
<script>
    function restoreArchivedData(id){
        const flag = confirm("Bạn có muốn khôi phục dữ liệu này?");
        if(flag === true){
            document.getElementById(id).submit();
        }
    }
</script>
@endsection
