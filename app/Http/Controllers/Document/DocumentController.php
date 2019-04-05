<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    public function index()
    {
        return view('document.index');
    }
    public function create()
    {
        return view('document.create');
    }
}
