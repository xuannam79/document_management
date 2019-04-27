@extends('layouts.user.master')
@section('title')
Tin nhắn đến
@endsection
@section('content')
<div class="container">
    <div id="cards-wrapper" class="cards-wrapper row">
        @include("common.errors")
        <div class="list-group" style="margin-top: 0">
        <a href="{{route('message.create')}}" class="btn btn-primary" role="button" style="width: 15%;margin-bottom:10px">Soạn tin nhắn</a>
            @foreach ($getMessages as $key => $message)
            <div class="list-group-item" style="padding: 10px 10px 0px 15px;">
                <img src="/templates/img/user/user-default.png" alt="" style="width: 50px;float: left;">
                <div style="float: left;margin-left:20px ">
                    <span class ="name userchinh1" style="margin:0 20px"><a href="" style="color:#f7f7f7;">{{$message->name}}</a></span><br/>
                    <a href=""><span style="color: black;line-height: 35px;">{{$message->title}}</span></a>
                </div>
                <div>
                    <span class="badge">{{$message->created_at}}</span><br>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
