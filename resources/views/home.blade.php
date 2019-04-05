@extends('layouts.user.master')
@section('title')
    Trang quản lý - ĐH Nội Vụ
@endsection
@section('content')
<div class="container">
    <div id="cards-wrapper" class="cards-wrapper row">
        <div class="item item-green col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <i class="icon fa fa-paper-plane"></i>
                </div>
                <h3 class="title">Văn bản đến</h3>
                <p class="intro">zxccczxc</p>
            <a class="link" href="{{ route('document.index') }}"><span></span></a>
            </div>
        </div>
        <div class="item item-pink item-2 col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <span aria-hidden="true" class="icon icon_puzzle_alt"></span>
                </div>
                <h3 class="title">Văn bản đi</h3>
                <p class="intro">
                    zzxczxcx
                </p>
                <a class="link" href="#"><span></span></a>
            </div>
        </div>
        <div class="item item-blue col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <span
                        aria-hidden="true"
                        class="icon icon_datareport_alt"
                        ></span>
                </div>
                <h3 class="title">Tạo mới và lưu văn bản</h3>
                <p class="intro">
                    zxczxczxc
                </p>
                <a class="link" href="{{ route('document.create') }}"><span></span></a>
            </div>
        </div>
        <div class="item item-purple col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <span aria-hidden="true" class="icon icon_lifesaver"></span>
                </div>
                <h3 class="title">Thời khóa biểu</h3>
                <p class="intro">
                   zxczxc
                </p>
                <a class="link" href="#"><span></span></a>
            </div>
        </div>
        <div class="item item-red col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <span aria-hidden="true" class="icon icon_genius"></span>
                </div>
                <h3 class="title">Lịch tuần trường</h3>
                <p class="intro">
                    zxczxc
                </p>
                <a class="link" href="#"><span></span></a>
            </div>
        </div>
        <div class="item item-orange col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <span aria-hidden="true" class="icon icon_gift"></span>
                </div>
                <h3 class="title">Lịch công tác tuần cơ sở</h3>
                <p class="intro">
                   zxczxc
                </p>
                <a class="link" href="#"><span></span></a>
            </div>
        </div>
        <div class="item item-green item-2 col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <span aria-hidden="true" class="icon icon_puzzle_alt"></span>
                </div>
                <h3 class="title">Hồ sơ văn bản</h3>
                <p class="intro">
                    zxczxc
                </p>
                <a class="link" href="#"><span></span></a>
            </div>
        </div>
        <div class="item item-primary item-2 col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <span aria-hidden="true" class="icon icon_puzzle_alt"></span>
                </div>
                <h3 class="title">Số địa chỉ</h3>
                <p class="intro">
                    zxczxc
                </p>
                <a class="link" href="#"><span></span></a>
            </div>
        </div>
        <div class="item item-orange item-2 col-lg-4 col-6">
            <div class="item-inner">
                <div class="icon-holder">
                    <span aria-hidden="true" class="icon icon_puzzle_alt"></span>
                </div>
                <h3 class="title">Biểu mẫu</h3>
                <p class="intro">
                    zxczxc
                </p>
                <a class="link" href="#"><span></span></a>
            </div>
        </div>
    </div>
</div>
@endsection
