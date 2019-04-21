<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;

class PersonalDocumentController extends Controller
{
    public function index()
    {
        return view("document.personal_document.index");
    }
}
