@extends("layouts.user.master")
@section("title")
Tạo tin nhắn mới
@endsection
@section("content")
<div class="container">
    <div id="cards-wrapper" class="cards-wrapper row">
        @include("common.errors")
        <div class="create-doc">
            {!! Form::open(["method"=>"POST", "route"=>"message.store", "enctype"=>"multipart/form-data"]) !!}
                <div class="form-group" style="width: 45%;float: left;margin-right: 5%;margin-left: 2%">
                    {!! Form::label("title", "Tiêu đề", []) !!}
                    {!! Form::text("title", old("title"), ["class"=>"form-control", "placeholder"=>"Nhập tiêu đề..."]) !!}
                </div>
                <div class="form-group" style="width: 45%;float:left">
                    {!! Form::label("receiver", "Người nhận", []) !!}
                    {!! Form::select("receiver", $users, old("receiver"), ["class"=>"form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("content", "Nội dung tin nhắn", []) !!}
                    {!! Form::textarea("content", old("content"), ["class"=>"form-control", "rows"=>"3", "placeholder"=>"Nhập nội dung..."]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("attachedFiles", "File đính kèm (nếu có)", []) !!}
                    {!! Form::file("attachedFiles[]", ["class"=>"form-control-file", "multiple", "style"=>"width: 50%;margin-left: 33%"]) !!}
                </div>
                <div class="clear"></div><br>
                {!! Form::submit("Submit", ["class"=>"btn btn-primary"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
