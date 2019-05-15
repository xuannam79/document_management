@extends('layouts.user.personal_document')
@section('title')
    Văn bản đến cá nhân
@endsection
@section('content')
    <div class="container">
        <div class="cards-wrapper">
            @include('common.errors')
        </div>
        <div id="cards-wrapper" class="cards-wrapper row detail-document-body">
            <div style="margin: 10px;width: 100%;;text-align: left">
                <div class="detail-head">
                    <h4 style="color:black;margin-bottom: 10px">{{ $document->title }}</h4>
                    <h5 style="color:black;display:inline">Công văn số: {{ $document->document_number }}</h5>
                    <div style="float: right"><span>Ngày ban hành: {{ date('d-m-Y', strtotime($document->publish_date)) }}</span></div>
                    <br>
                    <div style="margin-top: 35px;">
                        @if($document->avatar == 'user-default.png')
                            <img src="/templates/user/images/{{$document->avatar}}" style="width: 35px;height: 35px;border-radius: 2em;">&nbsp;
                        @else
                            <img src="/upload/images/{{$document->avatar}}" style="width: 35px;height: 35px;border-radius: 2em;">&nbsp;
                        @endif
                        <span style="color: black;font-weight: bold">{{ $document->name }}</span>
                        <div style="float: right">
                            <button class="pulse-button" id="show" title="Phản hồi"><i class="fa fa-reply"></i></button>
                        </div>
                    </div>
                    <br>
                    <div class="content-document">
                        <p>{{ $document->content }}</p>
                    </div>
                    <br>
                    <div class="line"></div>
                    <div>
                        <div style="margin: 5px 10px;">
                            @foreach($arrayFileDecode as $value)
                                <div class="preview1">
                                    <a href="/upload/files/document/{{ $value->name }}" download style="color:black;">
                                        @php
                                            $path = pathinfo($value->name,PATHINFO_EXTENSION);
                                        @endphp
                                        @if($path == 'docx' || $path == 'doc')
                                            <span class="preview__name files filesfix" title="{{ $value->name }}"><i class="fas fa-file-word"></i> {{ $value->name }}</span>
                                        @else
                                            <span class="preview__name files filesfix" title="{{ $value->name }}"><i class="fas fa-file-pdf"></i> {{ $value->name }}</span>
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="clear"></div>
                    @foreach($replyDocument as $value)
                        <div style="border: 3px solid #e5e7e9;max-width: 800px;margin-bottom: 10px;">
                            <div class="detail-head">
                                <div style="margin: 10px;">
                                    @if($document->avatar == 'user-default.png')
                                        <img src="/templates/user/images/{{$value->avatar}}" style="width: 35px;height: 35px;border-radius: 2em;">&nbsp;
                                    @else
                                        <img src="/upload/images/{{$value->avatar}}" style="width: 35px;height: 35px;border-radius: 2em;">&nbsp;
                                    @endif&nbsp;
                                    <span style="color: black;font-weight: bold">{{ $value->name }}</span>
                                    <div style="float: right">
                                        <span title="{{ date('H:m:i ( d-m-Y )', strtotime($value->created_at)) }}">
                                            {{Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans()}}
                                        </span>&nbsp;
                                        <button class="pulse-button" title="Phản hồi"><i class="fa fa-reply"></i></button>
                                    </div>
                                </div>
                                <br>
                                <div class="content-document" style="margin: 10px;">
                                    <p>{{ $value->content_reply }}</p>
                                </div>
                                <br>
                                <div class="line" style="max-width: 98%;margin: 0 auto;"></div>
                                <div >
                                    <div style="margin: 5px 10px;">
                                        @php
                                            $arrayFileReplyDecode = array();
                                            if(isset($value->file_attachment_reply)){
                                            $arrayFileReplyDecode = json_decode($value->file_attachment_reply);
                                            }
                                        @endphp
                                        @foreach($arrayFileReplyDecode as $value)
                                            @php
                                                $path = pathinfo($value,PATHINFO_EXTENSION);
                                            @endphp
                                            <div class="preview1">
                                                <a href="/upload/files/document_reply/{{ $value }}" download style="color:black;">
                                                    @if($path == 'docx' || $path == 'doc')
                                                        <span class="preview__name files filesfix" title="{{ $value }}"><i class="fas fa-file-word"></i> {{ $value }}</span>
                                                    @else
                                                        <span class="preview__name files filesfix" title="{{ $value }}"><i class="fas fa-file-pdf"></i> {{ $value }}</span>
                                                    @endif
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-light rep-bot-button"><i class="fa fa-reply"></i>&nbsp;Phản hồi</button>
                    @if(isset($getArrayOfUserSeen) && $getArrayOfUserSeen != null)
                        @if(isset($getArrayOfUserSeen) && $getArrayOfUserSeen->count() > 3)
                            <div class="user-is-read">
                                <img src="/templates/user/images/{{$getArrayOfUserSeen[0]->avatar}}" title="{{$getArrayOfUserSeen[0]->name}}" alt="Avatar" class="img-user-read">
                                <img src="/templates/user/images/{{$getArrayOfUserSeen[1]->avatar}}" title="{{$getArrayOfUserSeen[1]->name}}" alt="Avatar" class="img-user-read">
                                <img src="/templates/user/images/{{$getArrayOfUserSeen[2]->avatar}}" title="{{$getArrayOfUserSeen[2]->name}}" alt="Avatar" class="img-user-read">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="numberCircle" id="viewListUser" title="và {{$getArrayOfUserSeen->count()-3}} người khác đã xem">{{ $getArrayOfUserSeen->count() - 3 }}+</a>
                            </div>
                        @else
                            <a href="javascript:void(0)" class="user-is-read" data-toggle="modal" data-target="#myModal">
                                @foreach($getArrayOfUserSeen as $value)
                                    <img src="/templates/user/images/{{$value->avatar}}" title="{{$value->name}}" alt="Avatar" class="img-user-read">
                                @endforeach
                            </a>
                        @endif
                    @endif
                    <div class="reply display-none" id="rep-area">
                        <div>
                            <span class="badge"style="padding-left: 1em;float:none !important;">RE: {{ $document->document_number }}</span>
                        </div>
                        {!! Form::open(['method'=>'POST', 'route'=>['reply.document-personal', $document->documentID], 'files' => true]) !!}
                        {!! Form::textarea('content_reply', null, ['id' => 'content_reply', 'rows' => 5, 'cols' => 90, 'style' => 'resize:none']) !!}
                        <div class="upload">
                            <div class="upload__files">
                            </div>
                        </div>
                        <div class="reply-foot">
                            {!! Form::submit("Gửi", ['class' => 'btn btn-primary btchinh', 'id' => 'replyDocument']) !!}
                            <div class="reply-attach-file">
                                <label for="file-input">
                                    <i class="fa fa-paperclip" ></i>
                                </label>
                                {!! Form::file('file_attachment_reply[]', ['class' => 'upload__input', 'id' => 'file-input', 'multiple' => true])  !!}
                            </div>
                            <a class="fa fa-trash close-rep-area"></a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">i
            <div class="modal-content">
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0)" title="hiển thị người dùng đã xem">Thành viên</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="parent">
                            <div class="child">
                                <ul>
                                    @if(isset($getArrayOfUserSeen))
                                        @foreach($getArrayOfUserSeen as $value)
                                            <li class="list-user-seen">
                                                <div>
                                                    <div class="avatar-user-seen">
                                                        @if($value->avatar == 'user-default.png')
                                                            <img src="/templates/user/images/{{$value->avatar}}" style="width: 35px;height: 35px;border-radius: 2em;">&nbsp;
                                                        @else
                                                            <img src="/upload/images/{{$value->avatar}}" style="width: 35px;height: 35px;border-radius: 2em;">&nbsp;
                                                        @endif
                                                    </div>
                                                    @php
                                                        $departmentID = \App\Models\DepartmentUser::where('user_id', $value->id)->first()->department_id;
                                                        $departmentName = \App\Models\Department::where('id', $departmentID)->first();
                                                    @endphp
                                                    <div class="content-user-seen">
                                                        <div class="div1">{{ $value->name }}</div>
                                                        <div class="div2">Đơn vị : {{ $departmentName->name }}</div>
                                                    </div>
                                                    @if($value->id != auth()->user()->id)
                                                        <div class="message-user-seen">
                                                            <span>
                                                                <a href="">
                                                                    <i class="fab fa-facebook-messenger" style="font-size: 14px;margin-right: 2px"></i>
                                                                    Nhắn tin
                                                                </a>
                                                            </span>
                                                        </div>
                                                    @endif
                                                    <div class="clearfix"></div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="list-user-seen" style="text-align: center">
                                            Không có thông tin người dùng nào.
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Html::script(asset('/templates/user/js/attach-file.js')) }}
@endsection
