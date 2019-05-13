<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassDepartmentRequest extends FormRequest
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
            'newpassword' => 'required|max:30',
            'confirmpassword' => 'required|same:newpassword',
        ];
    }

    public function messages()
    {
        return [
            'newpassword.required' => 'Vui lòng nhập mật khẩu mới',
            'confirmpassword.required' => 'Vui lòng nhập lại mật khẩu mới',
            'confirmpassword.same' => 'Mật khẩu nhập lại phải giống mật khẩu mới',
        ];
    }
}
