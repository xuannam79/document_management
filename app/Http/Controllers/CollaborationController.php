<?php

namespace App\Http\Controllers;

use App\Models\CollaborationUnit;
use Illuminate\Http\Request;

class CollaborationController extends Controller
{
    public function index(){
        $collaborationUnits = CollaborationUnit::where("is_active", config('setting.active.is_active'))->get();

        return view('collaboration', compact('collaborationUnits'));
    }
}
