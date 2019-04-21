<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;

class SentDocumentController extends Controller
{
    public function index()
    {
        return view("document.sent_document.index");
    }
}
