<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;

class PendingDocumentController extends Controller
{
    public function index()
    {
        return view("document.pending_document.index");
    }
}
