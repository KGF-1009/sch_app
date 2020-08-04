<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsFormRequest extends FormRequest
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
        
        $lastYear = date('d-m-Y', strtotime('last year'));
        $now = date('d-m-Y', time()) ;
        $rule_date = "bail|date|required|after:".$lastYear."|before:".$now;
        return [
            //
            'student_id'    =>'bail|string|required|max:5|min:3',
            'fname'         => 'bail|string|required|max:25|min:2',
            'sname'         => 'nullable',
            'sex'           =>'required',
            'level'         => 'bail|numeric|required|min:1|max:7',
            'placeOfBirth'  =>'bail|string|required|min:2',
            'dateOfBirth'   =>'bail|date|before:01-01-1995',
            'address'       =>'bail|string|required|min:2|max:25',
            'enrollement_date' => $rule_date,
            'email'         =>'bail|email|required',
            'department_id' =>'bail|required|numeric|min:1'


        ];
    }
}

           //'image'         => 'nullable',
            //'image_type'    =>'nullable'
            //image size in kilobyte. 2048 kilobyte = 2048 * 1024 bytes = 2097152 bytes