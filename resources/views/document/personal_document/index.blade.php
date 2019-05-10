@extends('layouts.user.personal_document')
@section('title')
Văn bản đến cá nhân
@endsection
@section('content')
 <div class="container">
    <div id="cards-wrapper" class="cards-wrapper row">
        <div class="list-document-detail">
            <div id="sec1">
                <h4 class="h4-first">Văn bản đến cá nhân</h4>
                <div class="all-document list-group">
                    @foreach($documents as $document)
                        <div class="list-group-item ">
                            <a href="#" title="{{$document->content}}" >
                            <span class="name" style="max-width: 135px !important;color: black;">{{$document->name}}</span>
                                <span class="float-left" style="width: 60%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-align: left !important;">
                                    <span class="" style="color: black;">{{$document->title}}</span><br/>
                                    <span class="text-muted"><span style="color: black;">Trích yếu nội dung:&nbsp;{{$document->content}}</span></span>
                                </span>
                                <span class="badge">{{ date('d-m-Y', strtotime($document->created_at)) }}</span>
                            </a>
                            @if($document->is_seen == config('setting.document_user.is_unseen'))
                                <span class="userchinh3">Mới</span>
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
