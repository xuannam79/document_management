<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SentDocumentController extends Controller
{
    public function index()
    {
        Carbon::setLocale('vi');
        $documents = DB::table('documents')
            ->join('document_types', 'document_types.id', 'documents.document_type_id')
            ->where('user_id', Auth::user()->id)
            ->orderBy('documents.created_at', 'desc')
            ->select('documents.*', 'document_types.name as document_type')
            ->paginate(5);

        return view("document.sent_document.index", compact('documents'));
    }

    public function show($id){
        $document = DB::table('documents')
            ->join('document_types', 'document_types.id', '=', 'documents.document_type_id')
            ->select(
                'documents.*', 'document_types.name as document_type')
            ->where('documents.id', $id)
            ->first();
        $attachedFiles = DB::table('document_attachments')
            ->where('document_id', $document->id)
            ->get();
        if(DB::table('document_department')->where('document_id', $id)->count() > 0){
            $receivedDepartments = DB::table('document_department')
            ->join('departments', 'departments.id', '=', 'document_department.department_id')
            ->where('document_id', $document->id)
            ->select('departments.name')
            ->get();
        }
        elseif(DB::table('document_user')->where('document_id', $id)->count() > 0){

        }

        return view("document.sent_document.show", compact('document', 'attachedFiles', 'receivedDepartments'));
    }

    public function edit($id){
        if(DB::table('document_department')->where('document_id', $id)->count() > 0)
            return redirect(route('document-department.edit', $id));
        elseif(DB::table('document_user')->where('document_id', $id)->count() > 0)
            return redirect(route('document-personal.edit', $id));
        else
            return redirect(route('document-sent.index'))->with('messageFail', 'Lỗi khi tải văn bản, vui lòng kiểm tra lại!');
    }
}
