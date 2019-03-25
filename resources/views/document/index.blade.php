@extends('layouts.user.master')
@section('title')
Danh sách
@endsection
@section('content')
<div class="container">
    <div id="cards-wrapper" class="cards-wrapper row">
        <div class="list-group">
            <a href="#" class="list-group-item">
                <span class="name">Khoa du học tại chỗ</span> 
                <span class="float-left">
                    <span class="">[123456789123]</span>
                    <span class="text-muted" >-&nbsp;<span>Trích yếu nội dung [max:45]</span>...</span> 
                </span>
                <span class="badge">12:10 25/03/2019</span>
                <span class="pull-right"></span>
            </a>
            <a href="#" class="list-group-item read">
                <span class="name">Người gửi</span> 
                <span class="float-left">
                    <span class="">[123456789123]</span>
                    <span class="text-muted" >-&nbsp;<span>Trích yếu nội dung [max;45]</span>...</span> 
                </span>
                <span class="badge">12:10 25/03/2019</span> <span class="pull-right"></span>
            </a>
        </div>
    </div>
</div>
@endsection
