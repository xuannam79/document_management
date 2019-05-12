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
            ->join('document_department', 'documents.id', '=', 'document_department.document_id')
            ->join('document_types', 'document_types.id', '=', 'documents.document_type_id')
            ->select(
                'documents.*', 'document_types.name as document_type')
            ->where('documents.id', $id)
            ->first();
        $attachedFiles = DB::table('document_attachments')
            ->where('document_id', $document->id)
            ->get();
        return view("document.sent_document.show", compact('document', 'attachedFiles'));
    }
}
