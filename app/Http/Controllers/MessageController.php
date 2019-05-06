<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Message;
use App\Models\User;
use App\Models\MessageAttachments;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\DB;
use App\Uploaders\Uploader;


class MessageController extends Controller
{
    protected $uploader;

    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function index()
    {
        $getMessages = DB::table('messages')
            ->join('users', 'users.id', 'messages.sender_id')
            ->select('users.avatar', 'users.name', 'messages.id', 'messages.sender_id', 'messages.title', 'messages.created_at')
            ->where('messages.receiver_id', Auth::user()->id)->get();
        return view('message.index', compact('getMessages'));
    }
    public function create()
    {
        $users = User::where('id', '!=', Auth::user()->id)->pluck('name', 'id');
        return view('message.create', compact('users'));
    }

    public function store(MessageRequest $request)
    {
        DB::beginTransaction();
        try {
            $message['sender_id'] = Auth::user()->id;
            $message['title'] = $request->title;
            $message['content'] = $request->content;
            $message['receiver_id'] = $request->receiver;
            $messageId = Message::insertGetId($message);
            if (isset($request->attachedFiles)) {
                $attachedFiles = $request->only('attachedFiles');
                foreach ($attachedFiles['attachedFiles'] as $key => $file) {
                    MessageAttachments::create([
                        'messages_id' => $messageId,
                        'name' => $this->uploader->saveDocument($file),
                    ]);
                }
            }
            DB::commit();

            return redirect(route('message.index'))->with('alert', 'Tin nhắn đã được gửi');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect(route('message.index'))->with('alert', 'Gửi thất bại, vui lòng kiểm tra lại');
        }
    }
    public function show($id)
    {
        $getMessages = DB::table('messages')
            ->join('users', 'users.id', 'messages.sender_id')
            ->select('users.avatar', 'users.name', 'messages.id', 'messages.sender_id', 'messages.content', 'messages.title', 'messages.created_at')
            ->where('messages.id', $id)->first();
        $getAttachedFile = MessageAttachments::where('messages_id', $getMessages->id)->get();
        return view('message.show', compact('getMessages', 'getAttachedFile'));
    }

    public function reply($id, MessageRequest $request)
    {
        DB::beginTransaction();
        try {
            $receiveId = Message::select('sender_id')->where('id', $id)->first();
            $message['sender_id'] = Auth::user()->id;
            $message['title'] = $request->title;
            $message['content'] = $request->content;
            $message['receiver_id'] = $receiveId->sender_id;
            $messageId = Message::insertGetId($message);
            if (isset($request->attachedFiles)) {
                $attachedFiles = $request->only('attachedFiles');
                foreach ($attachedFiles['attachedFiles'] as $key => $file) {
                    MessageAttachments::create([
                        'messages_id' => $messageId,
                        'name' => $this->uploader->saveDocument($file),
                    ]);
                }
            }
            DB::commit();

            return redirect(route('message.show', $id))->with('alert', 'Tin nhắn đã được gửi');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect(route('message.show', $id))->with('alert', 'Gửi thất bại, vui lòng kiểm tra lại');
        }
    }
}
