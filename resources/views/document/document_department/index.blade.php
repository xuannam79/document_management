<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="favicon.ico" />
    {{ Html::style(asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')) }}
    {{ Html::style(asset('/templates/user/css/bootstrap.min.css')) }}
    {{ Html::style(asset('/templates/user/css/style.css')) }}
    {{ Html::style(asset('/templates/user/css/styles.css')) }}
    {{ Html::style(asset('/templates/user/css/datepicker.css')) }}
    {{ Html::script(asset('/templates/user/js/jquery-3.2.1.slim.min.js')) }}
    {{ Html::script(asset('/templates/user/js/popper.min.js')) }}
    {{ Html::script(asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')) }}
    {{ Html::style(asset('/css/all.css')) }}
    </head>
    <body class="landing-page">
        <div class="page-wrapper">
            @include('layouts.user.header')
            <section class="cards-section text-center">
                <div class="item item-green col-lg-4 col-6" id="left-bar">
                    <div class="leftbar-pending-document">
                        <ul>
                            <a href="#sec1">
                                <li>
                                    <i class="icon-leftbar fa fa-download"></i>&nbsp;
                                    Văn bản đến đơn vị
                                    <span class="count-new-document">5</span>
                                </li>
                            </a>
                            <a href="#sec2">
                                <li>
                                    <i class="icon-leftbar fa fa-download"></i>&nbsp;
                                    Văn bản đến cá nhân
                                    <span class="count-new-document">5</span>
                                </li>
                            </a>
                            <a href="#sec3">
                               <li>
                                    <i class="icon-leftbar fa fa-upload"></i>&nbsp;
                                    Văn bản đi
                                    <span class="count-new-document">5</span>
                               </li>
                            </a>
                            <a href="#sec4">
                                <li>
                                    <i class="icon-leftbar fa fa-download"></i>&nbsp;
                                    Văn bản đang chờ duyệt
                                    <span class="count-new-document">5</span>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="container">
                    <div id="cards-wrapper" class="cards-wrapper row">
                        <div class="list-document-detail">
                            <div id="sec1">
                                <h4 class="h4-first">Văn bản đến đơn vị</h4>
                                @foreach ($documents as $key => $document)
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
                                @endforeach
                                {{$documents->links()}}
                            </div>
                            <div id="sec2">
                                <h4>Văn bản đến cá nhân</h4>
                                <div class="all-document list-group">
                                    <div class="list-group-item ">
                                        <a href="#" title="content ở đây" >
                                            <span class="name" style="max-width: 135px !important;color: black;">name department</span>
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
                            <div id="sec3">
                                <h4>Văn bản đi</h4>
                                <div class="all-document list-group">
                                    <div class="list-group-item ">
                                        <a href="#" title="content ở đây" >
                                            <span class="name" style="max-width: 135px !important;color: black;">name department</span>
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
                            <div id="sec4">
                                <h4>Văn bản đang chờ duyệt</h4>
                                <div class="all-document list-group">
                                    <div class="list-group-item ">
                                        <a href="#" title="content ở đây" >
                                            <span class="name" style="max-width: 135px !important;color: black;">name department</span>
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
            </section>
        </div>
        @include('layouts.user.footer')
    {{ Html::script(asset('/templates/user/js/jquery-3.3.1.min.js')) }}
    {{ Html::script(asset('/templates/user/js/bootstrap.min.js')) }}
    {{ Html::script(asset('/templates/user/js/stickyfill.min.js')) }}
    {{ Html::script(asset('/templates/user/js/main.js')) }}
    {{ Html::script(asset('/templates/user/js/myStyle.js')) }}
    {{ Html::script(asset('/templates/user/js/bootstrapdatepick.min.js')) }}
    {{ Html::script(asset('/templates/user/js/bootstrap-datepicker.js')) }}
    {{ Html::script(asset('/js/all.js')) }}
    {{ Html::script(asset('/js/app.js')) }}
    </body>
</html>


