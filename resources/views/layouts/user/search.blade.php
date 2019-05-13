<div class="document-topBody">
    @include('common.errors')
    <div class="form-search-doc">
        @if($currentPage == "documentDepartment")
            @php
                $departmentId = App\Models\DepartmentUser::select('id')->where('user_id', Auth::user()->id)->first()->id;
                $departments = App\Models\Department::where('id', '!=', $departmentId)->pluck('name', 'id');
            @endphp
        @elseif($currentPage == "personalDocument")
            @php
                $departments = App\Models\Department::pluck('name', 'id');
            @endphp
        @endif
        {!! Form::open(['class'=>'form-inline form-search', 'route'=>'search-document']) !!}
            <div class="form-group mx-sm-3 mb-2" style="width: 85%">
                <div  class="input-group date" style="width: 20%">
                    {!! Form::text('date_start', '', ['data-date-format'=>'dd-mm-yyyy', 'class'=>'form-control date-area', 'readonly', 'id'=>'datepicker', 'placeholder'=>'Ngày bắt đầu...']) !!}
                    <span style="background-color: #fff" class="input-group-addon"></span>
                </div>
                <div class="input-group date" style="width: 20%">
                    {!! Form::text('date_end', '', ['data-date-format'=>'dd-mm-yyyy', 'class'=>'form-control date-area', 'readonly', 'id'=>'datepicker2', 'placeholder'=>'Ngày kết thúc...']) !!}
                    <span style="background-color: #fff" class="input-group-addon"></span>
                </div>
                @if($currentPage == "documentDepartment" || $currentPage == "personalDocument")
                {!! Form::select('department', $departments, '', ['class'=>'form-control', 'style'=>'width:35%']) !!}
                @endif
                {!! Form::hidden('page', $currentPage) !!}
                {!! Form::text('search', '', ['style'=>'width:25%', 'class'=>'form-control input-search', 'placeholder'=>'Nhập trích yếu...']) !!}
            </div>
            <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
        {!! Form::close() !!}
    </div>
</div>
