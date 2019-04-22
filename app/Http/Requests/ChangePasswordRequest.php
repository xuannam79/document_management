<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'oldpassword' => 'required',
            'newpassword' => 'required|max:30',
            'confirmpassword' => 'required|same:newpassword',
        ];
    }

    public function messages()
    {
        return [
            'oldpassword.required' => 'Vui lòng nhập mật khẩu cũ',
            'newpassword.required' => 'Vui lòng nhập mật khẩu mới',
            'confirmpassword.required' => 'Vui lòng nhập mật khẩu mới',
            'confirmpassword.same' => 'mật khẩu nhập lại phải giống mật khẩu mới',
        ];
    }
}
