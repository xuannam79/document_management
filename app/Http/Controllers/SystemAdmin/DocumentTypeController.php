<?php

namespace App\Http\Controllers\SystemAdmin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use App\Http\Requests\SystemAdmin\DocumentTypeRequest;
use App\Http\Requests\SystemAdmin\DocumentTypeEditRequest;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentTypes = DocumentType::where('is_active', config('setting.active.is_active'))->get();

        return view('system_admin.document_type.index', compact('documentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentTypes = DocumentType::where('is_active', config('setting.active.is_active'))->get();

        return view('system_admin.document_type.add', compact('documentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\DocumentTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentTypeRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->only('name');
            $input['is_active'] = config('setting.active.is_active');
            $getAllTypes = DocumentType::all();
            $inputRequest = trim(str_replace('-', '', str_slug($input['name'])));
            foreach ($getAllTypes as $types) {
                $nameType = trim(str_replace('-', '', str_slug($types->name)));
                if ($inputRequest == $nameType) {

                    return redirect()->route('document-type.create')->with('messageFail', 'Loại văn bản đã bị trùng! Vui lòng loại văn bản khác!');
                }
            }
            DocumentType::create($input);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return redirect(route('document-type.create'))->with('messageFail', 'Thêm thất bại');
        }

        return redirect(route('document-type.index'))->with('messageSuccess', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documentType = DocumentType::findOrFail($id);

        return view('system_admin.document_type.edit', compact('documentType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\DocumentTypeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentTypeEditRequest $request, $id)
    {
        try {
            $dataUpdate = $request->only('name');
            $result = DocumentType::whereId($id)->update($dataUpdate);

            if ($result) {

                return redirect(route('document-type.index'))->with('messageSuccess', 'Sửa thành công');
            }
            else{

                return redirect(route('document-type.index'))->with('messageFail', 'Dữ liệu không được sửa đổi');
            }

        } catch (Exception $e) {

            return redirect(route('document-type.index'))->with('messageFail', 'Sửa thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deactive = config('setting.active.no_active');
            $result = DocumentType::whereId($id)->update(['is_active' => $deactive]);

            if ($result) {

                return redirect(route('document-type.index'))->with('messageSuccess', 'Xóa thành công');
            } else {

                return redirect(route('document-type.index'))->with('messageFail', 'Xóa thất bại');
            }

        } catch (Exception $e) {

            return redirect(route('document-type.index'))->with('messageFail', 'Xóa thất bại');
        }
    }

    public function archive()
    {
        $documentTypes = DocumentType::where("is_active", config('setting.active.no_active'))->get();

        return view("system_admin.document_type.archive", compact('documentTypes'));
    }

    public function restore($id)
    {
        try {
            $active = config('setting.active.is_active');
            $result = DocumentType::whereId($id)->update(['is_active' => $active]);

            if ($result) {

                return redirect(route('document-type-archived'))->with('messageSuccess', 'Khôi phục thành công');
            } else {

                return redirect(route('document-type-archived'))->with('messageFail', 'Khôi phục thất bại');
            }

        } catch (Exception $e) {

            return redirect(route('document-type-archived'))->with('messageFail', 'Khôi phục thất bại');
        }
    }
}
