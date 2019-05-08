@extends('layouts.user.master')
@section('title')
    Chi tiết văn bản
@endsection
@section('content')
    <div class="container">
        <div id="cards-wrapper" class="cards-wrapper row detail-document-body">
            <div style="margin: 10px;width: 100%;;text-align: left">
                <div class="detail-head">
                    @include("common.errors")
                    <div>
                        <img src="/templates/img/user/{{$getMessages->avatar}}" style="width: 35px;height: 35px;border-radius: 2em;">&nbsp;
                        <span style="color: black;font-weight: bold">{{$getMessages->name}}</span>
                        <div style="float: right"><span>{{$getMessages->created_at}}</span>&nbsp;
                            <button class="pulse-button" id="show" title="Trả lời"><i class="fa fa-reply"></i></button>
                        </div>
                    </div>
                    <br>
                    <div class="content-document">
                        <p>{{$getMessages->content}}</p>
                    </div>
                    <br>
                    <div class="line"></div>
                <div>
                    <div class="upload__files">
                        @foreach($getAttachedFile as $key => $attachedFile)
                            <a href="/upload/files/message/{{$attachedFile->name}}" download class="preview"><span class="preview__name" title="{{$attachedFile->name}}">{{$attachedFile->name}}</span></a>
                        @endforeach
                    </div>
                </div>
                <button type="button" class="btn btn-light rep-bot-button"><i class="fa fa-reply"></i>&nbsp;Trả lời</button>
                <div class="reply display-none" id="rep-area">
                    {!! Form::open(['method'=>'POST', 'route'=>['reply-message', $getMessages->id], 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Tiêu đề', []) !!}
                            {!! Form::text('title', '', ['class'=>'form-control', 'id'=>'title', 'placeholder'=>'Nhập tiêu đề...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'Nội dung', []) !!}
                            {!! Form::text('content', '', ['id'=>'content', 'class'=>'form-control', 'placeholder'=>'Nhập nội dung...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::file('attachedFiles[]', ['class'=>'form-control-file', 'multiple']) !!}
                        </div>
                        {!! Form::submit('Gửi', ['class'=>'btn btn-primary']) !!}
                        <a class="fa fa-trash close-rep-area"></a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {{ Html::script(asset('/templates/user/js/attach-file.js')) }}
@endsection
