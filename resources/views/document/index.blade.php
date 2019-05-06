@extends('layouts.user.master')
@section('title')
Danh sách
@endsection
@section('content')
<div class="container">
    <div id="cards-wrapper" class="cards-wrapper row">
        <div class="document-topBody">
            <div class="form-search-doc">
                <form class="form-inline form-search">
                    <div class="form-group mx-sm-3 mb-2">
                        <div  class="input-group date" data-date-format="mm-dd-yyyy">
                            {!! Form::text('date_start', '', ['class'=>'form-control date-area', 'readonly', 'id'=>'datepicker', 'placeholder'=>'Ngày bắt đầu...']) !!}
                            <span style="background-color: #fff;width: 2%;" class="input-group-addon"></span>
                        </div>
                        <div class="input-group date" data-date-format="mm-dd-yyyy">
                            {!! Form::text('date_end', '', ['class'=>'form-control date-area', 'readonly', 'id'=>'datepicker2', 'placeholder'=>'Ngày kết thúc...']) !!}
                            <span style="background-color: #fff;width: 2%;" class="input-group-addon"></span>
                        </div>
                        {!! Form::select('department', ['1'=>'don vi 1'], '', ['class'=>'form-control', 'style'=>'min-width: 9em']) !!}
                        {!! Form::text('search', '', ['class'=>'form-control input-search', 'placeholder'=>'Nhập trích yếutìm kiếm...']) !!}
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
                <div onclick="showDocument('{{ $value->documentID }}')" class="list-group-item {{ ($checkNew == true)? '':'newDoc'}} @if(isset($id_reply->user_id)) {{($id_reply->user_id == Auth::user()->id)?'replied':''}}@endif" >
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
