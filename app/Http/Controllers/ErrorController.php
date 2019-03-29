<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //errors 404
    public function notFound() {
        return view('common.404');
    }
}
