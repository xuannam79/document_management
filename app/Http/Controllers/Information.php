<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Information extends Controller
{
    public function index(){
        return view('information');
    }
}
