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
            ->join('document_department', 'documents.id', '=', 'document_department.document_id')
            ->join('departments', 'document_department.department_id', '=', 'departments.id')
            ->where('user_id', Auth::user()->id)
            ->select(
                'documents.*', 'departments.name',
                'document_department.is_approved',
                'document_department.created_at as sending_date')
            ->orderBy('document_department.created_at', 'desc')
            ->paginate(5);

        return view("document.sent_document.index", compact('documents'));
    }
}
