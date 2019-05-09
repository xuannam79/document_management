<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SentDocumentController extends Controller
{
    public function index()
    {
        Carbon::setLocale('vi');
        $documents = DB::table('documents')
            ->where('user_id', Auth::user()->id)
            ->orderBy('documents.created_at', 'desc')
            ->paginate(5);

        return view("document.sent_document.index", compact('documents'));
    }
}
