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
                    <div class="list-group-item ">
                        <a href="#" title="content ở đây" >
                        <span class="name" style="max-width: 135px !important;color: black;">nam_department</span>
                            <span class="float-left" style="width: 60%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-align: left !important;">
                                <span class="" style="color: black;">title</span><br/>
                                <span class="text-muted"><span style="color: black;">Trích yếu nội dung:&nbsp;Trích yếu</span></span>
                            </span>
                            <span class="badge">Ngày</span>
                        </a>
                        <span class="name userchinh">Người gửi</span>
                        <span class ="name userchinh1"><a href="" style="color:#f7f7f7;">Tên người gửi</a></span>
                        <span class="userchinh3">New</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
