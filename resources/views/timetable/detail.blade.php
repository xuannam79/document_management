@extends('layouts.user.master')
@section('title')
    Show
@endsection
@section('content')
    <div class="container">
        <div id="cards-wrapper" class="cards-wrapper row detail-document-body">
            <div style="margin: 10px;width: 100%;;text-align: left">
                <div class="detail-head">
                    <div style="margin-bottom: 10px; color:red">
                        <a href="{{ route('timetable-users.index') }}" style="color:red">
                            <span>
                                <i class="icon fa fa-calendar-check-o"></i>
                                THỜI KHÓA BIỂU
                            </span>
                        </a>
                        >>
                        <span style="text-transform: uppercase">
                            {{ $department->name }}
                        </span>
                    </div>
                    <h4 style="color:black">
                        {{ $timeTable->name }}
                        <span style="font-style: italic;color: #999999;">
                            ( {{ date('h:m d-m-Y', strtotime($timeTable->created_at))  }} )
                        </span>
                    </h4>
                    <br>
                    <div class="content-document">
                        <p>{{ $timeTable->description }}</p>
                    </div>
                    <br>
                    @foreach($arrayFileDecode as $value)
                        @php
                            $path = pathinfo($value,PATHINFO_EXTENSION);
                        @endphp
                        @if($path == 'pdf')
                            <iframe src = "/files/department_admin/timetables/{{ $value }}" style = "width: 100%; height: 500px;"> </iframe>
                            <div style="text-align: center">
                                <span class="css-timetable-pdf-span">{{ $value }}</span>
                            </div>
                        @endif
                        @if($path == 'jpg' || $path == 'png')
                            <img src = "/files/department_admin/timetables/{{ $value }}" style = "width: 100%; height: 500px;"> </img>
                            <div style="text-align: center">
                                <span class="css-timetable-pdf-span">{{ $value }}</span>
                            </div>
                        @endif
                    @endforeach

                    <div class="line"></div>
                    <div >
                        <div class="upload__files">
                            @foreach($arrayFileDecode as $value)
                                <div class="preview">
                                    <a href="{{ Route('timetable.download',$value) }}" style="color:black;">
                                        @php
                                            $path = pathinfo($value,PATHINFO_EXTENSION);
                                        @endphp
                                        @if($path == 'docx' || $path == 'doc')
                                            <span class="preview__name files" title="{{ $value }}"><i class="fas fa-file-word"></i> {{ $value }}</span>
                                        @else
                                            <span class="preview__name files" title="{{ $value }}"><i class="fas fa-file-pdf"></i> {{ $value }}</span>
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="clear"></div>
                    @if($countTimeTable > 0)
                        <div class="list-group">
                            <span>
                                <i class="icon fa fa-calendar"></i>
                                 Thông tin các thời khóa biểu khác
                            </span>
                            <ul class="css-timetable-ul">
                                @foreach($timeTableRandom as $timeTableRandom)
                                    <li>
                                        <a href="{{ route('timetable-users.show', $timeTableRandom->id) }}" class="css-timetable-a">{{ $timeTableRandom->name }}
                                            <span class="css-timetable-span">
                                   ( {{ date('d-m-Y', strtotime($timeTableRandom->created_at)) }} )
                                    </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
    {{ Html::script(asset('/templates/user/js/attach-file.js')) }}
@endsection
