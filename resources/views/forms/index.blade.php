@extends('layouts.user.master')
@section('title')
    Danh Sách Biễu Mẫu
@endsection
@section('content')
    <div class="container">
        <div id="cards-wrapper" class="cards-wrapper row">
            <div class="list-group">
                @if($form->count() == 0)
                    <div>
                        <span>Không có thông tin biểu mẫu.</span>
                    </div>
                @endif
                @foreach($form as $value)
                    <div class="list-group-item" >
                        <a href="{{ route('users-forms.show',$value->id) }}" title="{{ $value->name }}" >
                            <span style="text-align: left;float: left;color: black;width: 80%">{{ $value->name }}</span>
                            <span class="badge">{{ date('d-m-Y', strtotime($value->sent_date)) }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
