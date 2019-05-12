@extends('layouts.user.personal_document')
@section('title')
Tìm kiếm
@endsection
@section('content')
 <div class="container">
    <div id="cards-wrapper" class="cards-wrapper row">
        <div class="list-document-detail">
            <div id="sec1">
                <div class="all-document list-group">
                    @if (isset($documentsDepartment))
                        @if(count($documentsDepartment)!=0)
                            <div class="alert alert-primary alert-dismissible fade show col col-8 message" role="alert">
                                <h5>Tìm thấy <strong>{{count($documentsDepartment)}}</strong> kết quả !</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>    
                            @foreach($documentsDepartment as $key => $document)
                            @php
                                $id = \App\Models\DocumentDepartment::where('document_id', $document->id)->first();
                                $id_reply = \App\Models\ReplyDocument::where('document_id',$document->id)->first();
                                $arrId = json_decode($id->array_user_seen);
                                $checkNew = false;
                                if(isset($arrId)){
                                foreach($arrId as $arr){
                                    if(Auth::user()->id == $arr){
                                        $checkNew = true;
                                    }
                                }
                                }
                            @endphp
                            
                            <div class="list-group-item" onclick="showDocumentDepartment('{{$document->id}}')">
                            <a href="" title="{{$document->content}}" >
                                <span class="name" style="max-width: 135px !important;color: black;">{{$document->department_name}}</span>
                                    <span class="float-left" style="width: 60%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-align: left !important;">
                                        <span class="" style="color: black;">{{$document->title}}</span></br>
                                    <span class="text-muted"><span style="color: black;">Trích yếu nội dung: {{ $document->content }}</span></span>
                                    </span>
                                    <span class="badge" title="{{ date('H:m:i ( d-m-Y )', strtotime($document->sending_date)) }}">
                                        {{Carbon\Carbon::createFromTimeStamp(strtotime($document->sending_date))->diffForHumans()}}
                                    </span>
                                </a>
                                <span class="name userchinh">Người gửi</span>
                                <span class ="name userchinh1"><a href="" style="color:#f7f7f7;">{{$document->user_name}}</a></span>
                                <span class ="name type_document"><span href="" style="color:#f7f7f7;">{{$document->document_type_name  }}</span></span>
                                @if($checkNew == true)
                                    <span class="userchinh2">đã xem</span>
                                @else
                                    <span class="userchinh3">Mới</span>
                                @endif
                            </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger alert-dismissible fade show col col-8 message" role="alert">
                                <strong>
                                    <ul>
                                        <li><h5>Không tìm thấy kết quả nào !</h5></li>
                                    </ul>
                                </strong>
                            </div>
                        @endif
                    @elseif(isset($sendDepartment))
                        @if(count($sendDepartment)!=0)
                            <div class="alert alert-primary alert-dismissible fade show col col-8 message" role="alert">
                                <h5>Tìm thấy <strong>{{count($sendDepartment)}}</strong> kết quả !</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @foreach($sendDepartment as $document)
                                
                                <div class="list-group-item ">
                                    <a href="#" title="{{$document->content}}" >
                                    <span class="name" style="max-width: 135px !important;color: black;">Số công văn: {{$document->document_number}}</span>
                                        <span class="float-left" style="width: 60%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-align: left !important;">
                                            <span class="" style="color: black;">Tiêu đề: {{$document->title}}</span><br/>
                                            <span class="text-muted"><span style="color: black;">Trích yếu nội dung:&nbsp;{{$document->content}}</span></span>
                                        </span>
                                    <span class="badge">{{ date('d-m-Y', strtotime($document->created_at)) }}</span>
                                    <span class ="name type_document" style="margin-left: 12em;"><span href="" style="color:#f7f7f7;">{{ $document->name }}</span></span>
                                    </a>
                                    @if($document->is_approved == config('setting.document.approved'))
                                        <span class="approved">Đã phê duyệt</span>
                                    @else
                                        <span class="userchinh3">Đang chờ</span>
                                    @endif
                                </div>
                            @endforeach
                            @else
                            <div class="alert alert-danger alert-dismissible fade show col col-8 message" role="alert">
                                <strong>
                                    <ul>
                                        <li><h5>Không tìm thấy kết quả nào !</h5></li>
                                    </ul>
                                </strong>
                            </div>
                        @endif
                    @elseif(isset($pendingDocument))
                        @if(count($pendingDocument)!=0)
                            <div class="alert alert-primary alert-dismissible fade show col col-8 message" role="alert">
                                <h5>Tìm thấy <strong>{{count($pendingDocument)}}</strong> kết quả !</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @foreach($pendingDocument as $document)
                                <div class="list-group-item ">
                                    <a href="{{ route('document-pending.show',$document->id) }}" title = "{{$document->content}}" >
                                    <span class="name" style="max-width: 135px !important;color: black;">{{$document->document_number}}</span>
                                        <span class="float-left" style="width: 60%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-align: left !important;">
                                            <span class="" style="color: black;">{{$document->title}}</span><br/>
                                            <span class="text-muted"><span style="color: black;">Trích yếu nội dung:&nbsp;{{$document->content}}</span></span>
                                        </span>
                                        <span class="badge">{{ date('d-m-Y', strtotime($document->created_at)) }}</span>
                                    </a>
                                    <span class="name userchinh">Người gửi</span>
                                    <span class ="name userchinh1"><a href="" style="color:#f7f7f7;">{{$document->name}}</a></span>
                                </div>
                            @endforeach
                        @else
                        <div class="alert alert-danger alert-dismissible fade show col col-8 message" role="alert">
                                <strong>
                                    <ul>
                                        <li><h5>Không tìm thấy kết quả nào !</h5></li>
                                    </ul>
                                </strong>
                            </div>
                        @endif
                    @elseif(isset($personalDocument))
                        @if(count($personalDocument)!=0)
                            <div class="alert alert-primary alert-dismissible fade show col col-8 message" role="alert">
                                <h5>Tìm thấy <strong>{{count($personalDocument)}}</strong> kết quả !</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @foreach($personalDocument as $value)
                            @php
                                $id = \App\Models\DocumentUser::where('document_id', $value->id)->first();
                                $id_reply = \App\Models\ReplyDocument::where('document_id',$value->id)->first();
                                $arrId = json_decode($id->array_user_seen);
                                $checkNew = false;
                                if(isset($arrId)){
                                    foreach($arrId as $arr){
                                        if(Auth::user()->id == $arr){
                                            $checkNew = true;
                                        }
                                    }
                                }
                            @endphp
                            <div class="list-group-item {{ ($checkNew == true)? '':'newDoc'}} @if(isset($id_reply->user_id)) {{($id_reply->user_id == Auth::user()->id)?'replied':''}}@endif" >
                                <a href="{{ route('document-personal.show',$value->id) }}" title="{{ $value->content }}" >
                                    <span class="name" style="max-width: 135px !important;color: black;">{{ $value->department_name }}</span>
                                    <span class="float-left" style="width: 60%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-align: left !important;">
                                        <span class="" style="color: black;">{{ $value->title }}</span></br>
                                        <span class="text-muted"><span style="color: black;">Trích yếu nội dung: {{ $value->content }}</span></span>
                                    </span>
                                    <span class="badge" title="{{ date('H:m:i ( d-m-Y )', strtotime($value->created_at)) }}">
                                        {{Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans()}}
                                    </span>
                                </a>
                                <span class="name userchinh">Người gửi</span>
                                <span class ="name userchinh1"><a href="" style="color:#f7f7f7;">{{ $value->user_name }}</a></span>
                                <span class ="name type_document"><span href="" style="color:#f7f7f7;">{{ $value->document_type_name }}</span></span>
                            @if($checkNew == true)
                                    <span class="userchinh2">đã xem</span>
                                @else
                                    <span class="userchinh3">Mới</span>
                                @endif
                            </div>
                        @endforeach
                        @else
                        <div class="alert alert-danger alert-dismissible fade show col col-8 message" role="alert">
                            <strong>
                                <ul>
                                    <li><h5>Không tìm thấy kết quả nào !</h5></li>
                                </ul>
                            </strong>
                        </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
