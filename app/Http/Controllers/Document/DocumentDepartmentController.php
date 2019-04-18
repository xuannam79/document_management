<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;

class DocumentDepartmentController extends Controller
{
    public function index()
    {
        $documents = Document::paginate(3);
        return view("document.document_department.index", compact('documents'));
    }
    // public function load_data(Request $request)
    // {
    //     $output = '';
    //     $id = $request->id;
    //     $documents = Document::where('id','>',$id)->orderBy('created_at','DESC')->limit(3)->get();
    //     if ( ! $documents->isEmpty() )
    //     {
    //         foreach($documents as $key => $document)
    //         {

    //             $output .= '<div class="all-document list-group">
    //             <div class="list-group-item ">
    //                 <a href="#" title="content ở đây" >
    //                 <span class="name" style="max-width: 135px !important;color: black;">'.$document->title.'</span>
    //                     <span class="float-left" style="width: 60%;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;text-align: left !important;">
    //                         <span class="" style="color: black;">title</span><br/>
    //                         <span class="text-muted"><span style="color: black;">Trích yếu nội dung:&nbsp;Trích yếu</span></span>
    //                     </span>
    //                     <span class="badge">Ngày</span>
    //                 </a>
    //                 <span class="name userchinh">Người gửi</span>
    //                 <span class ="name userchinh1"><a href="" style="color:#f7f7f7;">Tên người gửi</a></span>
    //                 <span class="userchinh3">New</span>
    //             </div>
    //         </div>';
    //         $last_id = $document->id;
    //         }
    //         return $output .= '<button id="btn-more" data-id="'.$last_id.'" > Load More</button>';
    //     }
    // }
}
