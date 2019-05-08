<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\DocumentAddRequest;
use App\Http\Requests\Document\ReplyDocumentRequest;
use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\Document;
use App\Models\Message;
use App\Models\DocumentAttachment;
use App\Models\DocumentDepartment;
use App\Models\DocumentType;
use App\Models\DocumentUser;
use App\Models\ReplyDocument;
use App\Uploaders\Uploader;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    protected $uploader;

    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function create()
    {
        $departments = DB::table('users')
            ->select('departments.id', 'departments.name')
            ->join('department_users', 'users.id', '=', 'department_users.user_id')
            ->join('departments', 'department_users.department_id', '=', 'departments.id')
            ->where('users.id', Auth::user()->id)
            ->pluck('name', 'id');
        $documentTypes = DocumentType::pluck('name', 'id');
        $first_key = key($departments->toArray());
        $receivedDepartments = Department::where('id', '!=', $first_key)->pluck('name', 'id');
        return view('document.create', compact('departments', 'documentTypes', 'receivedDepartments'));
    }

    public function store(DocumentAddRequest $request)
    {
        DB::beginTransaction();
        try {
            $documentData = $request->except('departments', 'attachedFiles', 'search', '_token');
            $documentData['user_id'] = Auth::user()->id;
            $documentData['is_approved'] = config('setting.document.pending');
            $departments = $request->only('departments');
            $attachedFiles = $request->only('attachedFiles');
            $documentId = Document::insertGetId($documentData);
            foreach ($departments as $department) {
                DocumentDepartment::create([
                    'document_id' => $documentId,
                    'department_id' => $department,
                    'sending_date' => Carbon::now(),
                ]);
            }
            foreach ($attachedFiles["attachedFiles"] as $key => $file) {
                DocumentAttachment::create([
                    'document_id' => $documentId,
                    'name' => $this->uploader->saveDocument($file, public_path('upload/files/document')),
                ]);
            }
            DB::commit();

            return redirect(route('document-sent.index'))->with('messageSuccess', 'Công văn đã được đưa vào danh sách phê duyệt');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect(route('document.create'))->with('messageFail', 'Gửi công văn thất bại, vui lòng kiểm tra lại');
        }
    }

    //ajax function
    public function handleSelectDepartment($id)
    {
        $receivedDepartments = Department::where('id', '!=', $id)->pluck('name', 'id');
        foreach ($receivedDepartments as $key => $value) {
            echo "<option value='$key'>$value</option>";
        }
    }
}
