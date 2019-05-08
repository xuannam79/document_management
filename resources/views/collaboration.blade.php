@extends('layouts.user.master')
@section('title')
    Danh Sách Các Đơn Vị Liên Kết
@endsection
@section('content')
<div class="container">
    <div class="card-header cards-wrapper row detail-document-body" style="margin-bottom: 5px;padding-left: 25%;">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Các Đơn Vị Liên Kết</h6>
    </div>
    <div id="cards-wrapper" class="cards-wrapper row detail-document-body">
        @foreach($collaborationUnits as $collaborationUnits)
            <div class="card__box col-md-6 col-sm-12">
                <div class="card" >
                    <div class="card__content" style="max-width: 100%">
                        <h4 class="card__title"><a href="#">{{ $collaborationUnits->name }}</a></h4>
                        <p class="card__text"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $collaborationUnits->address }}</p>
                        <p class="card__description">{{ $collaborationUnits->description }}</p>
                        <div class="card__bottom">
                            <div class="options">
                                <span class="date">
                                <i class="fa fa-envelope" aria-hidden="true"></i> {{ $collaborationUnits->email }}
                                </span>
                            </div>
                            <div class="card__price">
                            {{ $collaborationUnits->phone_number }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
