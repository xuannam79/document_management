<?php

namespace App\Http\Controllers\Document;

use App\Http\Requests\Document\ReplyDocumentRequest;
use App\Models\DepartmentUser;
use App\Models\DocumentUser;
use App\Models\ReplyDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentDepartmentController extends Controller
{
    public function index()
    {
        $departmentID = DepartmentUser::where('user_id', Auth::user()->id)->first();
        $document = DB::table('documents')->join('document_types', 'documents.document_type_id', '=', 'document_types.id')
            ->join('users', 'users.id', '=', 'documents.user_id')
            ->join('departments', 'departments.id', '=', 'documents.department_id')
            ->where('documents.department_id', $departmentID['department_id'])
            ->select('documents.*', 'documents.id as documentID', 'document_types.name as name_type_document', 'users.*', 'departments.name as name_department')
            ->get();

        return view("document.document_department.index", compact('document'));
    }

    public function checkUserSeen($id)
    {
        $userIdSeen = DocumentUser::where('document_id', $id)->first();
        if (isset($userIdSeen['array_user_seen']) && $userIdSeen['array_user_seen'] != "") {
            $jsonSeen = json_decode($userIdSeen['array_user_seen']);
            foreach ($jsonSeen as $value) {
                if (Auth::user()->id != $value) {
                    array_push($jsonSeen, Auth::user()->id);
                }
            }

            return $jsonSeen;

        } else {
            $jsonSeen = array();
                array_push($jsonSeen, Auth::user()->id);

            return $jsonSeen;
        }
    }

    public function show($id)
    {
//        check nguoi xem tin
        $jsonUserId = json_encode($this->checkUserSeen($id));
        DocumentUser::where('document_id', $id)->update(['array_user_seen' => $jsonUserId]);

        $document = DB::table('documents')->join('document_types', 'documents.document_type_id', '=', 'document_types.id')
            ->join('users', 'users.id', '=', 'documents.user_id')
            ->join('departments', 'departments.id', '=', 'documents.department_id')
            ->where('documents.id', $id)
            ->select('documents.*', 'documents.id as documentID', 'document_types.name as name_type_document', 'users.*', 'departments.name as name_department')
            ->first();
        $replyDocument = DB::table('reply_document')->join('users', 'reply_document.user_id', '=', 'users.id')
            ->where('reply_document.document_id', $id)
            ->get();

        //array file attachment
        $fileString = Document::where('id', $id)->first();
        $arrayFileDecode = array();
        if (isset($fileString['file_attachment'])) {
            $arrayFileDecode = json_decode($fileString['file_attachment']);
        }

        return view('document.document_department.detail', compact('document', 'arrayFileDecode', 'replyDocument', 'arrayFileReplyDecode'));
    }

    public function saveFile($input)
    {
        if (isset($input['file_attachment_reply'])) {
            foreach ($input['file_attachment_reply'] as $file) {
                $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileExtension = $file->getClientOriginalExtension();
                $newName = $fileName . '-' . time() . '.' . $fileExtension;
                $path = public_path('files/file_attachment');
                $file->move($path, $newName);
                $data[] = $newName;
            }

            return $data;
        }
    }

    public function downloadFileAttachment($nameFile)
    {
        $pathToFile = public_path('files/file_attachment/' . $nameFile);

        return response()->download($pathToFile);
    }

    public function reply(ReplyDocumentRequest $request, $id)
    {
        $input = $request->all();
        $input['document_id'] = $id;
        $input['user_id'] = Auth::user()->id;
        if (!isset($input['file_attachment_reply'])) {
            $input['file_attachment_reply'] = null;
            ReplyDocument::create($input);
        } else {
            $data = $this->saveFile($input);
            $input['file_attachment_reply'] = json_encode($data);
            ReplyDocument::create($input);
        }

        return redirect()->route('document-department.show', $id);

    }

}
