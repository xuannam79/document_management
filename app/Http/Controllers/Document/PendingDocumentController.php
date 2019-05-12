<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Models\DepartmentUser;
use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            ->join('users', 'users.id', '=', 'documents.user_id')
            ->where(['documents.department_id' => $currentDepartmentId, 'is_approved' => config('setting.department_user.no_approved')])
            ->select('documents.*', 'users.name')
            ->orderBy('documents.publish_date', 'desc')
            ->paginate(5);

        return view("document.pending_document.index", compact('documents'));
    }

    public function show($id)
    {
        $document = DB::table('documents')
            ->join('users', 'users.id', '=', 'documents.user_id')
            ->join('document_department', 'documents.id', '=', 'document_department.document_id')
            ->select(
                'documents.*', 'users.name', 'users.avatar')
            ->where('documents.id', $id)
            ->first();
        $receivedDepartments = DB::table('document_department')
            ->join('departments', 'departments.id', '=', 'document_department.department_id')
            ->where('document_id', $document->id)
            ->select('departments.name')
            ->get();
        $attachedFiles = DB::table('document_attachments')
            ->where('document_id', $document->id)
            ->get();
        return view("document.pending_document.show", compact('document', 'attachedFiles', 'receivedDepartments'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $updateDocumentResult = DB::table('documents')->whereId($id)->update(["is_approved" => 1]);
            $updateDocumentDepartmentResult = DB::table('document_department')->where('document_id' ,$id)->update(['sending_date' => Carbon::now()]);

            if ($updateDocumentResult && $updateDocumentDepartmentResult) {
                DB::commit();

                return redirect(route('document-sent.index'))->with('messageSuccess', 'Duyệt thành công');
            } else {
                DB::rollBack();

                return redirect(route('document-pending.index'))->with('messageFail', 'Duyệt thất bại');
            }
        } catch (Exception $e) {
            DB::rollBack();

            return redirect(route('document-pending.index'))->with('messageFail', 'Duyệt thất bại');
        }
    }
}
