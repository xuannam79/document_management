@extends('layouts.user.master')
@section('title')
    Trang quản lý - ĐH Nội Vụ
@endsection
@section('content')
<div class="container">
    <div id="cards-wrapper" class="cards-wrapper row">
        @if (auth()->user()->role == config('setting.roles.admin_department'))
            <div class="item item-blue col-lg-4 col-6">
                <div class="item-inner">
                    <div class="icon-holder">
                        <i class="icon fa fa-edit"></i>
                    </div>
                    <h3 class="title">Tạo mới và lưu văn bản</h3>
                    <p class="intro">
                        Tạo mới các văn bản, công văn, quyết định
                    </p>
                    <a class="link" href="{{ route('document.create') }}"><span></span></a>
                </div>
            </div>
            <div class="item item-orange item-2 col-lg-4 col-6">
                <div class="item-inner">
                    <div class="icon-holder">
                        <i class="icon fa fa-users"></i>
                    </div>
                    <h3 class="title">Danh sách cán bộ, nhân viên</h3>
                    <p class="intro">
                        Quản lý danh sách giảng viên, thành viên
                    </p>
                    <a class="link" href="{{ route('users.index') }}"><span></span></a>
                </div>
            </div>
            <div class="item item-red col-lg-4 col-6">
                <div class="item-inner">
                    <div class="icon-holder">
                        <i class="icon fa fa-calendar-check-o"></i>
                    </div>
                    <h3 class="title">Ủy quyền</h3>
                    <p class="intro">
                       Ủy quyền cho cán bộ soạn thảo và lưu văn bản
                    </p>
                    <a class="link" href="{{ route('delegacy.index') }}"><span></span></a>
                </div>
            </div>
        @endif

        <div class="item item-green col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <i class="icon fa fa-download"></i>
                </div>
                <h3 class="title">Văn bản đến</h3>
                <p class="intro">
                    Xem các văn bản đến và phản hồi
                </p>
            <a class="link" href="{{ route('document.index') }}"><span></span></a>
            </div>
        </div>
        <div class="item item-pink item-2 col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <i class="icon fa fa-upload"></i>
                </div>
                <h3 class="title">Văn bản đi</h3>
                <p class="intro">
                    Tạo và gửi các văn bản đi
                </p>
                <a class="link" href="#"><span></span></a>
            </div>
        </div>
        <div class="item item-purple col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <i class="icon fa fa-calendar-check-o"></i>
                </div>
                <h3 class="title">Thời khóa biểu</h3>
                <p class="intro">
                   Xem thời khóa biểu của trường
                </p>
                <a class="link" href="#"><span></span></a>
            </div>
        </div>
        <div class="item item-red col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <i class="icon fa fa-calendar"></i>
                </div>
                <h3 class="title">Lịch tuần trường</h3>
                <p class="intro">
                    Xem thời khóa biểu của tuần
                </p>
                <a class="link" href="#"><span></span></a>
            </div>
        </div>
        <div class="item item-orange col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <i class="icon fa fa-calendar-plus-o"></i>
                </div>
                <h3 class="title">Lịch công tác tuần cơ sở</h3>
                <p class="intro">
                   Xem lịch công tác các cấp cơ sở
                </p>
                <a class="link" href="#"><span></span></a>
            </div>
        </div>
        <div class="item item-green item-2 col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <i class="icon fa fa-calendar-plus-o"></i>
                </div>
                <h3 class="title">Hồ sơ văn bản</h3>
                <p class="intro">
                    Xem hồ sơ văn bản
                </p>
            <a class="link" href="{{ route("document-department.index") }}"><span></span></a>
            </div>
        </div>
        <div class="item item-primary item-2 col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <i class="icon fa fa-address-book"></i>
                </div>
                <h3 class="title">Số địa chỉ</h3>
                <p class="intro">
                    Xem các địa chỉ/ đơn vị liên kết
                </p>
                <a class="link" href="{{ route('collaboration.index') }}"><span></span></a>
            </div>
        </div>
        <div class="item item-orange item-2 col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <i class="icon fa fa-wpforms"></i>
                </div>
                <h3 class="title">Biểu mẫu</h3>
                <p class="intro">
                    zxczxc
                </p>
                <a class="link" href="{{route('document.show',1)}}"><span></span></a>
            </div>
        </div>
    </div>
</div>
@endsection
