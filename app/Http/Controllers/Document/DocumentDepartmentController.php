<?php

namespace App\Http\Controllers\Document;

use App\Http\Requests\Document\ReplyDocumentRequest;
use App\Models\DepartmentUser;
use App\Models\DocumentAttachment;
use App\Models\DocumentDepartment;
use App\Models\DocumentUser;
use App\Models\ReplyDocument;
use App\Models\DocumentType;
use App\Models\Department;
use App\Uploaders\Uploader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentDepartmentController extends Controller
{
    protected $uploader;

    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function index()
    {
        $departmentID = DepartmentUser::where('user_id', Auth::user()->id)->first();
        $document = DB::table('documents')->join('document_types', 'documents.document_type_id', '=', 'document_types.id')
            ->join('users', 'users.id', '=', 'documents.user_id')
            ->join('departments', 'departments.id', '=', 'documents.department_id')
            ->join('document_department', 'document_department.document_id', '=', 'documents.id')
            ->where(['document_department.department_id' => $departmentID['department_id'], 'documents.is_approved' => config('setting.document.approved')])
            ->select('documents.*', 'documents.id as documentID', 'document_types.name as name_type_document', 'users.*', 'departments.name as name_department', 'document_department.*')
            ->orderBy('document_department.sending_date', 'desc')
            ->get();

        return view("document.document_department.index", compact('document'));
    }

    public function checkUserSeen($id)
    {
        $userIdSeen = DocumentDepartment::where('document_id', $id)->first();
        $check = true;
        if (isset($userIdSeen['array_user_seen']) && $userIdSeen['array_user_seen'] != "") {
            $jsonSeen = json_decode($userIdSeen['array_user_seen']);
            foreach ($jsonSeen as $value) {
                if (Auth::user()->id == $value) {
                    $check = false;
                    break;
                }
            }
            if ($check == true){
                array_push($jsonSeen, Auth::user()->id);
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
        $departmentID = DepartmentUser::where('user_id', Auth::user()->id)->first()->department_id;
        $jsonUserId = json_encode($this->checkUserSeen($id));
        DocumentDepartment::where(['document_id' => $id, 'department_id' => $departmentID])->update(['array_user_seen' => $jsonUserId]);

        $document = DB::table('documents')->join('document_types', 'documents.document_type_id', '=', 'document_types.id')
            ->join('users', 'users.id', '=', 'documents.user_id')
            ->join('departments', 'departments.id', '=', 'documents.department_id')
            ->join('document_department', 'document_department.document_id', '=', 'documents.id')
            ->where(['documents.id' => $id , 'documents.is_approved' => config('setting.document.approved')])
            ->select('documents.*', 'document_department.*', 'documents.id as documentID', 'document_types.name as name_type_document', 'users.*', 'departments.name as name_department')
            ->first();
        $replyDocument = DB::table('reply_document')->join('users', 'reply_document.user_id', '=', 'users.id')
            ->where(['reply_document.document_id' => $id, 'is_reply_personal_document' => config('setting.reply.no_reply_personal_document')])
            ->select('reply_document.*', 'users.avatar', 'users.name')
            ->get();
        //array file attachment

        $arrayFileDecode = DocumentAttachment::where('document_id', $id)->get();

        return view('document.document_department.detail', compact('document', 'arrayFileDecode', 'replyDocument'));
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
            $path = 'upload/files/document_reply';
            $arrFiles = $this->uploader->saveFileAttach($input['file_attachment_reply'],$path);
            $input['file_attachment_reply'] = json_encode($arrFiles);
            ReplyDocument::create($input);
        }
        return redirect()->route('document-department.show', $id);
    }

    public function getListUserId($id)
    {
        $userId = DepartmentUser::where('department_id', $id)->get();
        $jsonUserId = array();
        $getIdAdminDepartment =  DepartmentUser::where(['department_id' => $id, 'position_id' => config('setting.position.admin_department')])->first()->user_id;
        if (isset($userId)) {
            foreach ($userId as $value) {
                if($value->user_id != $getIdAdminDepartment )
                    array_push($jsonUserId, $value->user_id);
            }
            return $jsonUserId;
        }
    }

    public function share($id)
    {
        $countDocumentExists = DocumentUser::where(['document_id' => $id])->get()->count();
        if ($countDocumentExists < 1) {
            try {
                $departmentID = DepartmentUser::where('user_id',
                    Auth::user()->id)->first();
                $input['document_id'] = $id;
                $input['department_id'] = $departmentID->department_id;
                $input['array_user_id'] = json_encode($this->getListUserId($departmentID->department_id));
                DocumentUser::create($input);

                return redirect()->route('document-department.show', $id)
                    ->with('messageSuccess', 'Chuyển tiếp thành công');
            } catch (Exception $e) {
                return redirect()->route('document-department.show', $id)
                    ->with('messageFail',
                        'Chuyển tiếp thất bại, vui lòng kiểm tra lại');
            }
        }
        else{
            return redirect()->route('document-department.show', $id)
                ->with('messageFail',
                    'Bạn đã chuyển tiếp văn bản này rồi , vui lòng kiểm tra lại');
        }
    }

    public function edit($id){
        $document = DB::table('documents')->join('document_types', 'documents.document_type_id', '=', 'document_types.id')
            ->join('users', 'users.id', '=', 'documents.user_id')
            ->join('departments', 'departments.id', '=', 'documents.department_id')
            ->join('document_department', 'document_department.document_id', '=', 'documents.id')
            ->where('documents.id', $id)
            ->select('documents.*', 'document_department.*', 'documents.id as documentID', 'document_types.name as name_type_document', 'users.*', 'departments.name as name_department')
            ->first();
        if(!isset($document))
            return redirect()->route('document-personal.index')->with('messageFail', 'Không tìm thấy văn bản này, vui lòng kiểm tra lại');
        $departmentId = DepartmentUser::where('user_id', Auth::user()->id)->first()['department_id'];
        $documentTypes = DocumentType::pluck('name', 'id');
        $currentReceivedDepartments = DB::table('document_department')
            ->join('departments', 'departments.id', '=', 'document_department.department_id')
            ->where('document_id',$id)->pluck('name' ,'department_id');
        $currentReceivedDepartmentIds = DB::table('document_department')
            ->join('departments', 'departments.id', '=', 'document_department.department_id')
            ->where('document_id',$id)
            ->pluck('department_id');
        $receivedDepartments = Department::whereNotIn('id', $currentReceivedDepartmentIds)
            ->where('id','!=', $departmentId)
            ->pluck('name', 'id');
        return view('document.document_department.edit', compact('document', 'documentTypes', 'receivedDepartments', 'currentReceivedDepartments'));
    }

    public function update(Request $request, $id){
        DB::beginTransaction();
        try {
            $departmentId = DepartmentUser::where('user_id', Auth::user()->id)->first()['department_id'];
            $documentData = $request->except('attachedFiles', '_token', '_method', 'search', 'departments');
            $documentData['publish_date'] = Carbon::parse($documentData['publish_date'])->format('Y-m-d');
            $document = Document::where('id', $id);
            if(!isset($document))
                return redirect()->route('document-personal.index')->with('messageFail', 'Không tìm thấy văn bản này, vui lòng kiểm tra lại');
            $document->update($documentData);
            $attachedFiles = $request->only('attachedFiles');
            if(count($attachedFiles) > 0){
                DocumentAttachment::where('document_id', $id)->delete();
                foreach ($attachedFiles["attachedFiles"] as $key => $file) {
                    DocumentAttachment::create([
                        'document_id' => $id,
                        'name' => $this->uploader->saveDocument($file, public_path('upload/files/document')),
                    ]);
                }
            }
            DocumentDepartment::where('document_id', $id)->delete();
            foreach ($request['departments'] as $department) {
                DocumentDepartment::create([
                    'document_id' => $id,
                    'department_id' => $department,
                    'sending_date' => Carbon::now(),
                ]);
            }
            DB::commit();
            return redirect(route('document-sent.index'))->with('messageSuccess', 'Cập nhật thành công');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect(route('document-department.edit', $id))->with('messageFail', 'Cập nhật công văn thất bại, vui lòng kiểm tra lại');
        }
    }
}
