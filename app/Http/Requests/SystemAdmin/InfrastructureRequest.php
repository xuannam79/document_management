<?php

namespace App\Http\Requests\SystemAdmin;

use Illuminate\Foundation\Http\FormRequest;

class InfrastructureRequest extends FormRequest
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
            'amount' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => "Vui lòng nhập số lượng",
            'name.required' => "Vui lòng nhập tên tài sản",
        ];
    }
}
