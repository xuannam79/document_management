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
                            <td style="text-align: center;"><span class="badge badge-pill badge-success">Khả dụng</span></td>
                            <td style="text-align: center;">
                                <a href="{{ route('document-type.edit', $documentType->id) }}" class="text-warning" style="margin-right: 8px;">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {!!Form::open(["method"=>"DELETE","id"=>"delete-document-type","route"=>["document-type.update",$documentType->id], "style"=>"display:inline;"])!!}
                                <a href="javascript:void(0)" class="text-danger data-delete" style="margin-left: 8px" onclick="submitForm('delete-document-type');">
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
<script>
    function submitForm(id){
        const flag = confirm("Bạn có chắc chắc chắn muốn xóa không?\n Các dữ liệu liên quan sẽ không bị ảnh hưởng.");
        if(flag === true){
            document.getElementById(id).submit();
        }
    }
</script>
@endsection
