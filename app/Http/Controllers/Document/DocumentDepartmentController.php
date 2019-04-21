<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;

class DocumentDepartmentController extends Controller
{
    public function index()
    {
        return view("document.document_department.index");
    }
}
