<?php

namespace App\Http\Requests\SystemAdmin;

use Illuminate\Foundation\Http\FormRequest;

class CollaborationUnitRequest extends FormRequest
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
            'name' => 'required|max:255|unique:collaboration_units',
            'phone_number' => 'required|max:30',
            'email' => 'required|max:255',
            'address' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên đơn vị liên kết',
            'name.max' => 'Chỉ được nhập tối đa 255 ký tự',
            'name.unique' => 'Tên đơn vị liên kết đã tồn tại',
            'phone_number.required' => 'Vui lòng nhập số điện thoại',
            'phone_number.max' => 'Số điện thoại quá dài',
            'email.required' => 'Vui lòng nhập email',
            'email.max' => 'Chỉ được nhập tối đa 255 ký tự',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.max' => 'Chỉ được nhập tối đa 255 ký tự',
        ];
    }
}
