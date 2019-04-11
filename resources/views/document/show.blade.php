@extends('layouts.user.master')
@section('title')
Show
@endsection
@section('content')
<div class="container">
    <div id="cards-wrapper" class="cards-wrapper row detail-document-body">
        <div style="margin: 10px;width: 100%;;text-align: left">
            <div class="detail-head">
                <h4 style="color:black">[12367845]&nbsp;Title here</h4>
                <br>
                <div>
                    <img src="/templates/admin/img/avatar/default.png" style="width: 35px;height: 35px;border-radius: 2em;">&nbsp;
                    <span style="color: black;font-weight: bold">Đơn vị abc</span>
                    <div style="float: right"><span >22:30&nbsp;10/04/1997</span>&nbsp;
                    <button class="pulse-button" title="Phản hồi"><i class="fa fa-reply"></i></button></div>
                </div><br>
                <div class="content-document">
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                    Trích yếu nội dung here
                </div><br><div class="line"></div>
                <div >
                    <div class="attach-file">
                        <a href="#"><i class="setSize fa fa-file"></i></a>
                    </div>
                </div>
                <div class="clear"></div>
                <button type="button" class="btn btn-light rep-bot-button"><i class="fa fa-reply"></i>&nbsp;Phản hồi</button>
             <div class="reply display-none" id="rep-area">
                <div>
                    <span style="color: #777;padding-left: 5em">Đơn vị abc</span>
                </div>
                <textarea name="" id="" cols="90" rows="5"></textarea>
                <div class="upload">
                    <div class="upload__files">
                    </div>
                </div>
                <div class="reply-foot">
                    <button type="button" class="btn btn-primary" style="float: left">Gửi</button>
                    <div class="reply-attach-file">
                        <label for="file-input">
                            <i class="fa fa-paperclip" ></i>
                        </label>
                        <input id="file-input" class="upload__input" type="file" multiple/>
                    </div>
                    <button class="fa fa-trash close-rep-area"></button>
                </div>
             </div>
            </div>
        </div>
    </div>
</div>
{{ Html::script(asset('/templates/user/js/attach-file.js')) }}
@endsection
