<?php

namespace App\Http\Requests\DepartmentAdmin;

use Illuminate\Foundation\Http\FormRequest;

class FormManagementRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'link' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Vui lòng nhập tên biểu mẫu",
            'link.required' => "Vui lòng chọn file  để upload",
            'description.required' => "Vui lòng nhập mô tả",
        ];
    }
}
