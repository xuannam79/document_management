@extends('layouts.user.master')
@section('title')
Danh sách
@endsection
@section('content')
<div class="container">
    <div id="cards-wrapper" class="cards-wrapper row">
        <div class="document-topBody">
            <div class="dropdown show dropdown-search">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sắp xếp theo...
                </a>
                
                <div class="dropdown-menu dropdown-filter" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                </div>
            </div>
            <div class="form-search-doc">
                <form class="form-inline form-search">
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="password" class="form-control input-search" id="inputPassword2" placeholder="Nhập nội dung tìm kiếm...">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
                </form>
            </div>
        </div>
        <div class="list-group">
            <a href="{{ route('document.show', 1) }}" class="list-group-item">
                <span class="name">Khoa du học tại chỗ</span> 
                <span class="float-left">
                    <span class="">[123456789123]&nbsp;<span>Titlee here</span></span>
                    <span class="text-muted" >-&nbsp;<span>Trích yếu nội dung [max:35]</span>...</span> 
                </span>
                <span class="badge">12:10 25/03/2019</span>
                <span class="pull-right"></span>
            </a>
            <a href="{{ route('document.show', 1) }}" class="list-group-item read">
                <span class="name">Người gửi</span> 
                <span class="float-left">
                    <span class="">[123456789123]&nbsp;<span>Titlee here</span></span>
                    <span class="text-muted" >-&nbsp;<span>Trích yếu nội dung [max:35]</span>...</span> 
                </span>
                <span class="badge">12:10 25/03/2019</span> <span class="pull-right"></span>
            </a>
        </div>
    </div>
</div>
@endsection
