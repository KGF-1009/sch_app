<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Score_sheetFormRequest extends FormRequest
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
            
            'student_id'=>'bail|required|string|min:1|max:10',
            'course_id'=>'bail|required|string|min:1|max:10',
            'score'=>'bail|nullable|numeric|max:20|min:0',
            'score_ex'=>'bail|nullable|numeric|max:20|min:0',
            'semester'=>'bail|required|in:1,2,3,4',
            'academic_year'=>'bail|required|in:2019/2020,2020/2021,2021/2022,2022/2023,2023/2024,2024/2025,2025/2026,2026/2027,2027/2028',
            'confirmed'=>'bail|boolean|required',
            'confirmed_ex'=>'bail|boolean|required'
            //
        ];
            // 'course_id' => 'bail|required|string|min:1|max:10',
            // 'student_id' => 'bail|required|string|min:1|max:10'
    }
}
