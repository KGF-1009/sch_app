<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseStoreRequest extends FormRequest
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

     //  dd('rules');
        return [
            'course_id' => 'required|min:2|max:8',
            'cname' => 'required|string|min:2|max:30',
            'teacher_id'=>'nullable|integer|min:1',            
            'level'=>'integer|min:1|max:7',
            'coeff'=>'integer|min:1|max:4',
            'department_id' =>'nullable|integer|min:1'
            //
        ];
    }

    public function messages()
    {
        
        return [];
    }
}
