@extends('layouts.user.master')
@section('title')
Danh sách
@endsection
@section('content')
<div class="container">
    <div id="cards-wrapper" class="cards-wrapper row">
        <div class="document-topBody">
            <div class="dropdown show dropdown-search">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sắp xếp theo...
                </a>
                
                <div class="dropdown-menu dropdown-filter" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                </div>
            </div>
            <div class="form-search-doc">
                <form class="form-inline form-search">
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="password" class="form-control input-search" id="inputPassword2" placeholder="Nhập nội dung tìm kiếm...">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
                </form>
            </div>
        </div>
        <div class="list-group">
            @foreach($document as $value)
                @php
                    $id = \App\Models\DocumentUser::where('document_id',$value->documentID)->first();
                    $id_reply = \App\Models\ReplyDocument::where('document_id',$value->documentID)
                        ->first();
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
                    <a href="{{ route('document.show',$value->documentID) }}" title="{{ $value->content }}" >
                        <span class="name" style="max-width: 135px !important;color: black;">{{ $value->name_department }}</span>
                        <span class="float-left" style="width: 60%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-align: left !important;">
                            <span class="" style="color: black;">{{ $value->title }}</span></br>
                            <span class="text-muted"><span style="color: black;">Trích yếu nội dung: {{ $value->content }}</span></span>
                        </span>
                        <span class="badge">{{ $value->publish_date }}</span>
                    </a>
                    <span class="name userchinh">Người gửi</span>
                    <span class ="name userchinh1"><a href="" style="color:#f7f7f7;">{{ $value->name }}</a></span>
                    @if($checkNew == true)
                        <span class="userchinh2">đã xem</span>
                    @else
                        <span class="userchinh3">New</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
