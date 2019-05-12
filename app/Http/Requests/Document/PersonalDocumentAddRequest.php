<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

class PersonalDocumentAddRequest extends FormRequest
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
            'document_number' => 'required|max:255|unique:documents',
            'document_type_id' => 'required',
            'title' => 'required|max:190',
            'publish_date' => 'required',
            'content' => 'required|max:500',
        ];
    }

    public function messages()
    {
        return [
            'document_number.required' => 'Vui lòng nhập số văn bản',
            'document_number.max' => 'Chỉ được nhập tối đa 255 ký tự',
            'document_number.unique' => 'Số văn bản đã tồn tại',
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.max' => 'Chỉ được nhập tối đa 190 ký tự',
            'document_type_id.required' => 'Vui lòng chọn loại văn bản',
            'publish_date.required' => 'Vui lòng chọn ngày ban hành',
            'content.required' => 'Vui lòng nhập trích yếu nội dung',
            'content.max' => 'Chỉ được nhập tối đa 400 ký tự',
        ];
    }
}
