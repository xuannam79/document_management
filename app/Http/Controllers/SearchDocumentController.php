<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SearchDocumentController extends Controller
{
    public function search(SearchRequest $request)
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
                    'documents.content', 'document_department.sending_date',
                    'document_types.name as document_type_name', 'users.name as user_name')
            ->whereBetween('document_department.created_at', array($date_start, $date_end))
            ->where([['document_department.department_id', $departmentId], ['documents.content', 'LIKE','%'.$keySearch.'%']])
            ->get();
            return view('search_document', compact('documentsDepartment'));

        }elseif($request['page'] === 'sendDocument'){
            $date_start = Carbon::parse($request->date_start)->format('Y-m-d');
            $date_end = Carbon::parse($request->date_end)->format('Y-m-d');
            $keySearch = $request->search;
            $sendDepartment = DB::table('document_department')
            ->join('documents', 'document_department.document_id', 'documents.id')
            ->join('document_types', 'documents.document_type_id', 'document_types.id')
            ->select('documents.document_number', 'documents.content', 'documents.title', 'document_department.created_at', 'document_types.name', 'documents.is_approved')
            ->whereBetween('document_department.created_at', array($date_start, $date_end))
            ->where('documents.content', 'LIKE','%'.$keySearch.'%')
            ->get();
            return view('search_document', compact('sendDepartment'));

        }elseif($request['page'] === 'pendingDocument'){
            $date_start = Carbon::parse($request->date_start)->format('Y-m-d');
            $date_end = Carbon::parse($request->date_end)->format('Y-m-d');
            $keySearch = $request->search;
            $pendingDocument = DB::table('document_department')
            ->join('documents', 'document_department.document_id', 'documents.id')
            ->join('document_types', 'documents.document_type_id', 'document_types.id')
            ->join('users', 'users.id', 'documents.user_id')
            ->select('documents.id', 'users.name', 'documents.document_number', 'documents.content', 'documents.title', 'document_department.created_at', 'documents.is_approved')
            ->whereBetween('document_department.created_at', array($date_start, $date_end))
            ->where('documents.content', 'LIKE','%'.$keySearch.'%')
            ->get();
            return view('search_document', compact('pendingDocument'));

        }elseif($request['page'] === 'personalDocument'){
            $date_start = Carbon::parse($request->date_start)->format('Y-m-d');
            $date_end = Carbon::parse($request->date_end)->format('Y-m-d');
            $departmentId= $request->department;
            $keySearch = $request->search; 
            $personalDocument = DB::table('document_user')
            ->join('documents', 'document_user.document_id', 'documents.id')
            ->join('departments', 'document_user.department_id', 'departments.id')
            ->join('document_types', 'documents.document_type_id', 'document_types.id')
            ->join('users', 'users.id', 'documents.user_id')
            ->select('departments.name as department_name', 'documents.id', 'documents.title', 
                    'documents.content', 'document_user.created_at',
                    'document_types.name as document_type_name', 'users.name as user_name')
            ->whereBetween('document_user.created_at', array($date_start, $date_end))
            ->where([['document_user.department_id', $departmentId], ['documents.content', 'LIKE','%'.$keySearch.'%']])
            ->get();
            return view('search_document', compact('personalDocument'));

        }
    }
}
