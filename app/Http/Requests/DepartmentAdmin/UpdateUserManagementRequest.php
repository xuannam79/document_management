<?php

namespace App\Http\Requests\DepartmentAdmin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserManagementRequest extends FormRequest
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
            'password' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'avatar' => 'mimes:jpeg,png,bmp,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => "Vui lòng nhập mật khẩu",
            'name.required' => "Vui lòng nhập họ tên",
            'address.required' => "Vui lòng nhập địa chỉ",
            'phone.required' => "Vui lòng nhập số điện thoại",
            'phone.numeric' => "Số điện thoại chỉ bao gồm số",
            'avatar.mimes' => "Ảnh đại diện phải là một tệp loại: jpeg, png, bmp, gif, svg.",
        ];
    }
}
