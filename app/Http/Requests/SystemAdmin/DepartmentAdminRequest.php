<?php

namespace App\Http\Requests\SystemAdmin;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentAdminRequest extends FormRequest
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
            'department_id' => 'unique:department_users',
        ];
    }

    public function messages()
    {
        return [
            'department_id.unique' => 'Phòng ban này đã có trưởng đơn vị',         
        ];
    }
}
