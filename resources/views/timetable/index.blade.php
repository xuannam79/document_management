@extends('layouts.user.master')
@section('title')
    Danh Sách Thời Khóa Biểu
@endsection
@section('content')
    <div class="container">
        <div id="cards-wrapper" class="cards-wrapper row">
            <div class="list-group">
                @if($timeTable->count() == 0)
                    <div>
                        <span>Không có thông tin thời khóa biểu.</span>
                    </div>
                @endif
                <ul class="css-timetable-ul">
                    @foreach($timeTable as $value)
                        <li>
                            <a href="{{ route('timetable-users.show', $value->id) }}" class="css-timetable-a">{{ $value->name }}
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
