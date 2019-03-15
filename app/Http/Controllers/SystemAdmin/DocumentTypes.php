<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use App\Repositories\DocumentType\DocumentTypeRepositoryInterface;
use Illuminate\Http\Request;

class DocumentTypes extends Controller
{

    protected $documentTypeRepository;

    public function __construct(DocumentTypeRepositoryInterface $documentTypeRepository)
    {
        $this->documentTypeRepository = $documentTypeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentTypes = $this->documentTypeRepository->all();
        var_dump($documentTypes);
        //return view('system_admin.documenttype.index', compact('documentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('system_admin.document_type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->only('name');
            $this->documentTypeRepository->create($input);
        } catch (Exception $e) {

            return redirect(route('document-type.create'))->with('alert', 'Thêm thất bại');
        }

        return redirect(route('document-type.index'))->with('alert', 'Thêm thành công');
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
        $documentType = $this->documentTypeRepository->find($id);

        return view('system_admin.document_type.edit', compact('documentType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $documentType = $this->documentTypeRepository->find($id);

        try {
            $dataUpdate = $request->only('name');
            $result = $this->documentTypeRepository->update($dataUpdate, $id);

            if ($result) {

                return redirect(route('document-type.index'))->with('alert', 'Sửa thành công');
            }

        } catch (Exception $e) {

            return redirect(route('document-type.edit'))->with('alert', 'Sửa thất bại');
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
            $result = $this->documentTypeRepository->delete($id);

            if ($result) {

                return redirect(route('document-type.index'))->with('alert', 'Xóa thành công');
            }

        } catch (Exception $e) {

            return redirect(route('document-type.index'))->with('alert', 'Xóa thất bại');
        }
    }
}
