<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index()
    {
        $form = Form::where('is_active', config('setting.active.is_active'))->get();

        return view('forms.index', compact('form'));
    }

    public function show($id)
    {
        $form = Form::where('is_active', config('setting.active.is_active'))->where('id',$id)->first();
        //array file attachment
        $fileString = Form::where('id', $id)->first();
        $arrayFileDecode = array();
        if(isset($fileString['link'])){
            $arrayFileDecode = json_decode($fileString['link']);
        }

        return view('forms.detail', compact('form', 'arrayFileDecode'));
    }
}
