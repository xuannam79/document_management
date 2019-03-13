<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Users extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => "Bạn vui lòng nhập email",
            'email.email' => "Vui lòng nhập đúng định dạng email",
            'password.required' => "Vui lòng nhập mật khẩu",
            'name.required' => "Vui lòng nhập họ tên",
            'address.required' => "Vui lòng nhập địa chỉ",
            'phone.required' => "Vui lòng nhập số điện thoại",
            'phone.numeric' => "Số điện thoại chỉ bao gồm số",
        ];
    }
}
