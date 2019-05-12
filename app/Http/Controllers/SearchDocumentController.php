<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SearchDocumentController extends Controller
{
    public function search(Request $request)
    {
        if($request['page'] === 'documentDepartment') {
            $date_start = Carbon::parse($request->date_start)->format('Y-m-d');
            $date_end = Carbon::parse($request->date_end)->format('Y-m-d');
            $departmentId= $request->department;
            $keySearch = $request->search; 
            $documentsDepartment = DB::table('document_department')
            ->join('documents', 'document_department.document_id', 'documents.id')
            ->join('departments', 'document_department.department_id', 'departments.id')
            ->join('document_types', 'documents.document_type_id', 'document_types.id')
            ->join('users', 'users.id', 'documents.user_id')
            ->select('departments.name as department_name', 'documents.id', 'documents.title', 
                    'documents.content', 'document_department.sending_date', 'document_department.sending_date',
                    'document_types.name as document_type_name', 'users.name as user_name')
            ->whereDate('document_department.sending_date', '>=', $date_start)
            ->whereDate('document_department.sending_date', '<=', $date_end)
            ->where([['document_department.department_id', $departmentId], ['documents.content', 'LIKE','%'.$keySearch.'%']])
            ->get();
        }
        return view('search_document', compact('documentsDepartment'));
    }
}
