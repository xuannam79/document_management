<div class="item item-green col-lg-4 col-6" id="left-bar">
    @php
        $document = App\Models\Document::join('document_department', 'document_department.document_id', '=', 'documents.id')
        ->select('documents.id', 'documents.title')->limit(5)->get();
        $message = App\Models\Message::where('receiver_id', Auth::user()->id)->limit(5)->get();
    @endphp
    <div class="big-sidebar">
        <ul class="big-sidebar-ul">
        <a href="{{route('document.index')}}"><li class="big-li"><span>Văn bản đến</span></li></a>
            <li>
                <ul class="small-ul">
                    @foreach($document as $key => $document)
                <a href="{{route('document.show',$document->id)}}"><li><i class="fas fa-hand-point-right"></i>&nbsp;<span>{{ $document->title }}</span></li></a>
                    @endforeach
                </ul>
            </li>
        <a href="{{route('message.index')}}"><li class="big-li"><span>Tin nhắn đến</span></li></a>
            <li>
                <ul class="small-ul">
                    @foreach($message as $key => $message)
                <a href="{{route('message.show', $message->id)}}"><li><i class="fas fa-hand-point-right"></i>&nbsp;<span>{{ $message->title }}</span></li></a>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>
