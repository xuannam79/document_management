<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\DocumentDepartment;
use App\Models\User;
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

    public function getUserSeen($id){
        $documentData = DocumentDepartment::where(['document_id'=> $id])->get();
        $arrayMerge = array();
        if(isset($documentData)) {
            foreach ($documentData as $value) {
                $jsonUser = json_decode($value->array_user_seen);
                if (isset($jsonUser)) {
                    $arrayMerge = array_merge($arrayMerge, $jsonUser);
                }
            }
            $arrayMerge = array_unique($arrayMerge);
            $userId = User::whereIn('id', $arrayMerge)->orderBy('name', 'asc')->get();
            return $userId;
        }
        else {
                return array();
        }
    }

    public function getDepartmentSeen($id){
        $documentData = DocumentDepartment::where('document_id', $id)->get();
        $arrayDepartmentID = array();
        if(isset($documentData)){
            foreach ($documentData as $value){
                if(isset($value->array_user_seen) || $value->array_user_seen != null){
                    array_push($arrayDepartmentID, $value->department_id);
                }
            }
            return $arrayDepartmentID;
        }
    }

    public function show($id){

        //lay phong ban da xem
        $listDepartmentID = $this->getDepartmentSeen($id);
        if(isset($listDepartmentID)){
            $nameOfDepartment = Department::whereIn('id', $listDepartmentID)->get();
        }
        else {
            $nameOfDepartment = array();
        }
        //lay nguoi da xem tin trong phong ban
        $getArrayOfUserSeen = $this->getUserSeen($id);
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

        return view("document.sent_document.show", compact('nameOfDepartment','getArrayOfUserSeen', 'document', 'attachedFiles', 'receivedDepartments'));
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
