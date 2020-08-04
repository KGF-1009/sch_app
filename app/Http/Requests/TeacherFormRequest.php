<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherFormRequest extends FormRequest
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
        $lower_agelimit = date('d-m-Y', strtotime('-25 years'));
        $upper_agelimit = date('d-m-Y', strtotime('-50 years'));
        $age_rule = 'bail|required|before:'.$lower_agelimit.'|after:'.$upper_agelimit;
        return [
            //
            'matricule'=> 'bail|required|min:2|max:5',
            'fname' =>'bail|required|min:2|max:25',
            'sname' =>'nullable', 
            'sex' =>'required',
            'dateOfBirth' =>$age_rule,
            'placeOfBirth' =>'required',
            'department_id' =>'bail|numeric|required|min:1',
            'nation'=>'bail|required|in:cameroon,nigeria,ghana,gabon',
            'role' =>'bail|required|in:no role,Principal,Vice Principal,Discipline Master,Bursar,HOD,Dean',
            'tel' =>'required',
            'email' =>'bail|required|email',
            'tel' => 'bail|required|min:4|max:20',
            'diploma' =>'bail|string|required|in:none,1st degree,masters,Phd,Doc',
            'address' => 'bail|required|min:2|max:25'

            //'image' => 'nullable',
           // 'image_type' =>'nullable'
            //'image' => 'bail|nullable|file|image|mimes:jpeg,png,bmp|size:2048'
            //image size in kilobyte. 2048 kilobyte = 2048 * 1024 bytes = 2097152 bytes

        ];
    }

}
