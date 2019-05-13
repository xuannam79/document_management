@extends('layouts.user.master')
@section('title')
    Danh Sách Lịch Tuần
@endsection
@section('content')
    <div class="container">
        <div id="cards-wrapper" class="cards-wrapper row">
            <div class="col-lg-12 col-ml-12">
                <div class="card-header py-3" style="margin-bottom: 5px;">
                    <h6 class="m-0 font-weight-bold text-primary">Lịch Tuần</h6>
                </div>
            </div>
            <div class="list-group">
                @if($schedule->count() == 0)
                    <div>
                        <span>Không có thông tin lịch tuần trường.</span>
                    </div>
                @endif
                <ul class="css-timetable-ul">
                    @foreach($schedule as $value)
                        <li>
                            <a href="{{ route('schedule.show', $value->id) }}" class="css-timetable-a">{{ $value->title }}
                                <span class="css-timetable-span">
                               ( {{ date('d-m-Y', strtotime($value->created_at)) }} )
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
