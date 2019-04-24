@extends('layouts.user.master')
@section('title')
    Danh sách đang chờ duyệt
@endsection
@section('content')
    <div class="container">
        <div id="cards-wrapper" class="cards-wrapper row" >
            <div class="card-header py-3" style="margin-bottom: 18px !important;margin: 0px auto;">
                <h6 class="m-0 font-weight-bold text-primary">Danh Sách Biễu Mẫu Đang Chờ Phê Duyệt</h6>
            </div>
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
            <div class="list-group" style="position: relative">
                @foreach($form as $value)
                    <div class="list-group-item" >
                        <a href="{{ route('forms.approval.detail',$value->id) }}" title="{{ $value->name }}" >
                            <span class="name" style="max-width: 25% !important;color: black; border-right: 2px solid;padding-right: 16px;">{{ $value->name }}</span>
                            <span class="float-left" style="width: 50%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-align: left !important;">
                                <span class="text-muted"><span style="color: black;">Trích yếu nội dung: {{ $value->description }}</span></span>
                            </span>
                            <span class="badge">{{ $value->created_at }}</span>
                        </a>
                    </div>
                    <a href="javascript:void(0)" onclick="acceptApproval('acceptApproval'+{{$value->id }})" style="position: absolute;top:2px;right: -30px"><i class="fas fa-check-circle" style="font-size: 20px;color: green" ></i></a>
                    {!! Form::open(['method'=>'PUT', 'route'=>['forms.approval.accept',$value->id], 'id' => 'acceptApproval'.$value->id]) !!}
                    {!! Form::close() !!}
                    <a href="javascript:void(0)" onclick="cancelApproval('cancelApproval'+{{ $value->id }})" style="position: absolute;top:28px;right: -30px"><i class="fas fa-ban" style="font-size: 20px;color:red" ></i></a>
                    {!! Form::open(['method'=>'PUT', 'route'=>['forms.approval.cancel',$value->id], 'id' => 'cancelApproval'.$value->id]) !!}
                    {!! Form::close() !!}
                @endforeach
            </div>
            <div style="display: inline-block">

            </div>
        </div>
    </div>
@endsection
