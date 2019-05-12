@extends('layouts.user.personal_document')
@section('title')
    Văn bản đang chờ duyệt
@endsection
@section('content')
    <div class="container">
        <div id="cards-wrapper" class="cards-wrapper row detail-document-body">
            <div style="margin: 10px;width: 100%;text-align: left">
                <div class="detail-head">
                    <h4 style="color:black; margin-bottom: 10px">{{ $document->title }}</h4>
                    <h5 style="color:black">Công văn số: {{ $document->document_number }}</h5>
                    <br>
                    <div style="margin-top: 35px;">
                        @if($document->avatar == 'user-default.png')
                            <img src="/templates/user/images/{{$document->avatar}}" style="width: 35px;height: 35px;border-radius: 2em;">&nbsp;
                        @else
                            <img src="/upload/images/{{$document->avatar}}" style="width: 35px;height: 35px;border-radius: 2em;">&nbsp;
                        @endif&nbsp;
                        <span style="color: black;font-weight: bold">{{ $document->name }}</span>
                        <div style="float: right"><span>Ngày ban hành: {{ date('d-m-Y', strtotime($document->publish_date)) }}</span></div>
                    </div>
                    <br>
                    <div class="content-document">
                        <p>{{ $document->content }}</p>
                    </div>
                    <br>
                    <div>
                        <div class="upload__files">
                            @foreach($attachedFiles as $file)
                            <a href="/upload/files/document/{{$file->name}}" download class="preview"><span class="preview__name" title="{{$file->name}}">{{$file->name}}</span></a>
                            @endforeach
                        </div>
                    </div>
                    <h6 style="color:black">Danh sách các đơn vị nhận:</h6>
                    <ul>
                        @foreach($receivedDepartments as $receivedDepartment)
                            <li>-{{$receivedDepartment->name}}</li>
                        @endforeach
                    </ul>
                    <button class="btn btn-primary" onclick="acceptApproval('acceptApproval'+{{$document->id }}, 'văn bản')">Chấp Nhận</button>
                    <button class="btn btn-danger" onclick="cancelApproval('cancelApproval'+{{ $document->id }}, 'văn bản')">Từ Chối</button>
                    {!! Form::open(['method'=>'PATCH', 'route'=>['document-pending.update',$document->id], 'id' => 'acceptApproval'.$document->id]) !!}
                    {!! Form::close() !!}
                    {!! Form::open(['method'=>'DELETE', 'route'=>['document-pending.destroy',$document->id], 'id' => 'cancelApproval'.$document->id]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {{ Html::script(asset('/templates/user/js/attach-file.js')) }}
@endsection
