<?php

namespace App\Http\Requests\SystemAdmin;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleWeekRequest extends FormRequest
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
            'title' => 'required',
            'start' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Vui lòng nhập tiêu đề",
            'start.required' => "Vui lòng nhập ngày bắt đầu",
        ];
    }
}
