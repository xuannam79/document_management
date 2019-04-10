<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
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
            'address' => 'required',
            'phone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Vui lòng nhập họ tên",
            'address.required' => "Vui lòng nhập địa chỉ",
            'phone.required' => "Vui lòng nhập số điện thoại",
            'phone.numeric' => "Số điện thoại chỉ bao gồm số",
        ];
    }
}
