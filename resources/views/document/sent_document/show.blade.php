@extends('layouts.user.personal_document')
@section('title')
    Văn bản đã gửi
@endsection
@section('content')
    <div class="container">
        <div id="cards-wrapper" class="cards-wrapper row detail-document-body">
            <div style="margin: 10px;width: 100%;text-align: left">
                <div class="detail-head">
                    <h4 style="color:black">{{ $document->title }}</h4>
                    <h5 style="color:black">Công văn số: {{ $document->document_number }}</h5>
                    <h6 style="color:black">Loại văn bản: {{ $document->document_type }}</h6>
                    <h6 style="color:black">Ngày ban hành: {{ date('d-m-Y', strtotime($document->publish_date)) }}</h6>
                    <br>
                    <br>
                    <div class="content-document">
                        <p>Về việc: {{ $document->content }}</p>
                    </div>
                    <br>
                    @if(isset($receivedDepartments))
                      <h6 style="color:black">Danh sách các đơn vị nhận:</h6>
                      <ul>
                          @foreach($receivedDepartments as $receivedDepartment)
                              <li>-{{$receivedDepartment->name}}</li>
                          @endforeach
                      </ul>
                    @endif
                    <div>
                        <h6 style="color:black">File đính kèm:</h6>
                        <div class="upload__files">
                            @foreach($attachedFiles as $file)
                            <a href="/upload/files/document/{{$file->name}}" download class="preview"><span class="preview__name" title="{{$file->name}}">{{$file->name}}</span></a>
                            @endforeach
                        </div>
                    </div>

                    @if($document->is_approved == config('setting.document.pending'))
                        <a href="{{ route('document-sent.edit', $document->id) }}">Chỉnh sửa văn bản</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{ Html::script(asset('/templates/user/js/attach-file.js')) }}
@endsection
