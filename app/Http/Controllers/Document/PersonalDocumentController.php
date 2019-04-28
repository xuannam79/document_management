<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersonalDocumentController extends Controller
{
    public function index()
    {
        Carbon::setLocale('vi');
        $documents = DB::table('documents')
            ->join('document_user', 'documents.id', '=', 'document_user.document_id')
            ->join('departments', 'departments.id', '=', 'documents.department_id')
            ->where('document_user.user_id', Auth::user()->id)
            ->select('documents.*', 'departments.name', 'document_user.is_seen')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $this->setSeenDocument($documents);

        return view("document.personal_document.index", compact('documents'));
    }

    private function setSeenDocument($documents)
    {
        DocumentUser::whereIn('document_id', $documents->pluck('id'))->update(['is_seen' => config('setting.document_user.is_seen')]);
    }
}
