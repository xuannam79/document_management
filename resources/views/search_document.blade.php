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
                            <div class="alert alert-danger alert-dismissible fade show col col-8 message" role="alert">
                                <h5>Tìm thấy <strong>{{count($documentsDepartment)}}</strong> kết quả !</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
