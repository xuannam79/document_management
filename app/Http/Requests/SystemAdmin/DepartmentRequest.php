<?php

namespace App\Http\Requests\SystemAdmin;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name' => 'required|max:255|unique:departments',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên phòng ban',
            'name.max' => 'Chỉ được nhập tối đa 255 ký tự',
            'name.unique' => 'Đã có tên phòng ban này, vui lòng nhập tên khác'           
        ];
    }
}
