<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'date_start' => 'required',
            'date_end' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date_start.required' => "Vui lòng chọn ngày bắt đầu",
            'date_end.required' => "Vui lòng chọn ngày kết thúc",
        ];
    }
}
