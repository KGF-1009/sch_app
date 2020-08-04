<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentStoreRequest extends FormRequest
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
            //
            'teacher_id' => 'bail|nullable|integer',
            'name'       => 'bail|required|string|min:2|max:25',
            'description'=>'bail|string|required|min:5:|max:250',

        ];
    }
}
