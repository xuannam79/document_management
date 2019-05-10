@extends('layouts.user.personal_document')
@section('title')
Văn bản đi
@endsection
@include("common.errors")
@section('content')
 <div class="container">
    <div id="cards-wrapper" class="cards-wrapper row">
        <div class="list-document-detail">
            <div id="sec1">
                <h4 class="h4-first">Văn bản đã gửi</h4>
                <div class="all-document list-group">
                    @foreach($documents as $document)
                        <div class="list-group-item ">
                            <a href="#" title="{{$document->content}}" >
                            <span class="name" style="max-width: 135px !important;color: black;">Số công văn: {{$document->document_number}}</span>
                                <span class="float-left" style="width: 60%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-align: left !important;">
                                    <span class="" style="color: black;">Tiêu đề: {{$document->title}}</span><br/>
                                    <span class="text-muted"><span style="color: black;">Trích yếu nội dung:&nbsp;{{$document->content}}</span></span>
                                </span>
                            <span class="badge">{{ date('d-m-Y', strtotime($document->created_at)) }}</span>
                            </a>
                            @if($document->is_approved == config('setting.document.approved'))
                                <span class="approved">Đã phê duyệt</span>
                            @else
                                <span class="userchinh3">Đang chờ</span>
                            @endif
                        </div>
                    @endforeach
                    <div>
                        {{ $documents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
