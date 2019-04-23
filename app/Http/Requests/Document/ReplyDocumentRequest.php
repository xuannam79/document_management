<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

class ReplyDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content_reply' => 'required|max:400',
            'file_attachment_reply.*' => 'file|mimes:xlsx,xls,csv,jpg,jpeg,png,bmp,doc,docx,pdf,tif,tiff',
        ];
    }

    public function messages()
    {
        return [
            'content_reply.required'      => 'Vui lòng nhập nội dung Phản hồi',
            'content_reply.max'           => 'Chỉ được nhập tối đa 400 ký tự',
            'file_attachment_reply.*.mimes' => "File Upload phải là một tệp loại: xlsx,xls,csv,jpg,jpeg,png,bmp,doc,docx,pdf,tif,tiff.",

        ];
    }
}
