<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DepartmentUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PendingDocumentController extends Controller
{
    public function index()
    {
        Carbon::setLocale('vi');
        $currentDepartmentId = DepartmentUser::where([
                'position_id' => 1,
                'user_id' => Auth::user()->id,
                'is_active' => config('setting.department_user.active')])
            ->first()->department_id;
        $documents = DB::table('documents')
            ->join('document_department', 'documents.id', '=', 'document_department.document_id')
            ->join('users', 'users.id', '=', 'documents.user_id')
            ->where(['documents.department_id' => $currentDepartmentId, 'document_department.is_approved' => config('setting.department_user.no_approved')])
            ->select('documents.*', 'users.name', 'document_department.sending_date')->get();
        $pendingDocumentsQuantity = count($documents);
        
        return view("document.pending_document.index",compact('documents', 'pendingDocumentsQuantity'));
    }
}
