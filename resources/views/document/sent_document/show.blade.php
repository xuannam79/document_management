@extends('layouts.user.personal_document')
@section('title')
    Văn bản đã gửi
@endsection
@section('content')
    <div class="container">
        <div id="cards-wrapper" class="cards-wrapper row detail-document-body">
            <div style="margin: 10px;width: 100%;text-align: left">
                <div class="detail-head">
                    <h4 style="color:black">{{ $document->title }}</h4>
                    <h5 style="color:black">Công văn số: {{ $document->document_number }}</h5>
                    <h6 style="color:black">Loại văn bản: {{ $document->document_type }}</h6>
                    <h6 style="color:black">Ngày ban hành: {{ date('d-m-Y', strtotime($document->publish_date)) }}</h6>
                    <br>
                    <br>
                    <div class="content-document">
                        <p>Về việc: {{ $document->content }}</p>
                    </div>
                    <br>
                    @if(isset($receivedDepartments))
                      <h6 style="color:black">Danh sách các đơn vị nhận:</h6>
                      <ul>
                          @foreach($receivedDepartments as $receivedDepartment)
                              <li>-{{$receivedDepartment->name}}</li>
                          @endforeach
                      </ul>
                    @endif
                    <div>
                        <h6 style="color:black">File đính kèm:</h6>
                        <div class="upload__files">
                            @foreach($attachedFiles as $file)
                            <a href="/upload/files/document/{{$file->name}}" download class="preview"><span class="preview__name" title="{{$file->name}}">{{$file->name}}</span></a>
                            @endforeach
                        </div>
                    </div>
                    @if($document->is_approved == config('setting.document.pending'))
                        <a href="{{ route('document-sent.edit', $document->id) }}">Chỉnh sửa văn bản</a>
                    @endif
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
                            <a class="nav-link active" href="javascript:void(0)" data-toggle="tab" data-target="#home" title="hiển thị các đơn vị đã xem">Đơn vị</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" data-toggle="tab" data-target="#menu1" title="hiển thị người dùng đã xem">Thành viên</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="parent">
                                <div class="child">
                                    <ul>
                                        @if(isset($nameOfDepartment))
                                            @foreach($nameOfDepartment as $value)
                                                <li>
                                                    <a href=""> {{ $value->name }}
                                                </li>
                                            @endforeach
                                        @else
                                            <li>
                                                Không có đơn vị nào đã xem văn bản này.
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="menu1">
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
    </div>
    {{ Html::script(asset('/templates/user/js/attach-file.js')) }}
@endsection
