@extends('layouts.user.master')
@section('title')
    Biễu Mẫu Đã Bị Xóa
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="card-header py-3" style="margin-bottom: 5px;">
                    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Biễu Mẫu Đã Bị Xóa</h6>
                </div>
                <a href="{{ route('forms.index') }}" class="btn btn-primary" style="float:left;}">Quay Lại</a>
                @include('common.errors')
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="20%">Tên biễu mẫu</th>
                        <th width="20%">Tải về</th>
                        <th width="30%">Mô tả</th>
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
                            <td>
                                <ul class="d-flex" style="list-style-type: none;margin-left: -16px;">
                                    {!!Form::open(["method" => "PUT", "route" => ["forms.archive.restore", $form->id ], "id" => "restoreArchive".$form->id])!!}
                                    <a href="javascript:void(0)" class="text-success data-delete frm-margin-left-8" onclick="restoreArchivedData('restoreArchive'+{{$form->id}})" title="Khôi phục">
                                        <i class="fa fa-trash-restore"></i>
                                    </a>
                                    {!!Form::close()!!}
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Vietnamese.json"
            }
        });
        } );
    </script>
@endsection
