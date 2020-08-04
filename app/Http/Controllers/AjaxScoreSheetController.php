<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\score_sheet;
use App\students;
use App\teacher;
use App\course;

//use Validator;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;
use App\Exceptions\CustomException; //extend exception class
use Illuminate\Support\Facades\DB;
use Exception;


class AjaxScoreSheetController extends Controller
{
    
    
    public function IsValidString(string $str)
    {   
        // return boolean. True if string and less than 10 characters

        return (is_string($str) and 2<strlen($str) and strlen($str)<10 );

    }

    public function read_scoreSheet(Request $request) {

        //retrives a record from score sheet table 
        //expecting a get request with id of student
        //interested in.
        //Route::get('/read_scoreSheet', 'AjaxScoreSheetController@read_scoreSheet');
        //Ajax request  from students/show.js

        //validate $request->id === student id
        $v = Validator::make(['id'=> $request->id, 'semester' => $request->semester], 
                            ['id'=>'bail|required|string|min:1|max:10', 'semester' => 'in:1,2,3']);


        //retrieve score sheet of student student

        $semester = $request->semester;

        $scoreSheets = DB::table('score_sheets')
        ->join('courses','score_sheets.course_id', '=', 'courses.course_id')
        ->join('teachers','courses.teacher_id', '=', 'teachers.id')
        ->where('score_sheets.student_id', '=', $request->id)
        ->where('score_sheets.semester', '=', $semester)
        ->select(DB::raw('courses.*,teachers.*,score_sheets.*, 0.4*score_sheets.score + 0.6*score_sheets.score_ex as Total_score'))->orderBy('score_sheets.semester', 'asc')
        ->orderBy('courses.cname', 'asc')->get();

        $recap = DB::table('score_sheets')
        ->join('courses','score_sheets.course_id', '=', 'courses.course_id')
        ->join('teachers','courses.teacher_id', '=', 'teachers.id')
        ->where('score_sheets.student_id', '=', $request->id)
        ->where('score_sheets.semester', '=', $semester)
        ->select(DB::raw('score_sheets.student_id, sum(0.4*score_sheets.score*courses.coeff + 0.6*score_sheets.score_ex*courses.coeff) as grand_total, sum(courses.coeff) as total_coeff'))->groupBy('score_sheets.student_id')->first();

     

       // dd($scoreSheets);'courses.cname', 'courses.course_id', 'courses.coeff', 'teachers.fname', 'teachers.sname','score_sheets.semester','score_sheets.score','score_sheets.score_ex','score_sheets.confirmed_ex', 'score_sheets.student_id', 'score_sheets.id'

       return view('score_sheet.ajax.read_scoreSheet', compact('scoreSheets', 'recap', 'semester'));


    }


    public function store(Request $request)
    {
//Route::post('/scoreSheet', 'AjaxScoreSheetController@store');
//Ajax request  from students/show.js
        
        $student_id = $request->student_id;
        $course = '';
        $academic_year = $request->academic_year;
        $semester = $request->semester;
        $score = 0;
        $confirmed = true;
        $score_ex = 0;
        $confirmed_ex = true; 

        $errorMessage ='';
        $isValid = TRUE;
        $codes="";

        if(empty($request->courses_id))
        {
             return response('<p ><ul><li class=\'text-danger\'>Please select at least a course to proceed.</li></ul></p>');
        }

        try {

            foreach($request->courses_id as $course_id)
            {               
                
                $data = compact('student_id', 'course_id','score','score_ex','academic_year', 'semester', 'confirmed','confirmed_ex');
                $course = $course_id;

                //get the data
                //validate the data
                $validator = Validator::make($data, 

                    [
                        'student_id'=>'bail|required|string|max:10|min:1',
                        'score' =>'nullable|numeric|min:0|max:20',
                        'score_ex' =>'nullable|numeric|min:0|max:20',
                        'course_id' =>'bail|required|string|max:10|min:1',
                        'academic_year' => 'required|in:2019/2020,2020/2021,2021/2022,2022/2023,2023/2024,2024/2025,2025/2026,2026/2027,2027/2028,2028/2029,2029/2030,2030/2031,2031/2032,2032/2033',
                        'semester' => 'required|in:1,2,3,4',
                        'confirmed' =>'required|nullable|boolean',
                        'confirmed_ex' =>'required|nullable|boolean'
                    ]);

                //save is data is valid
                //redirect if validation fails
                // $isValid = $isValid AND $validator->fails();
                // $errorMessage = (empty($errorMessage) AND $validator->fails()) ? $Validator->errors()->all() : $errorMessage;
                //ignore further error messages after the first one.

                if( !($validator->fails()) )
                {
                   
                   $codes = $codes.', '.$course_id;
                   $scoreSheet = score_sheet::updateorCreate($data);
 
                    
                }else
                {                    

                    return response('<h2> '.$validator->erors()->all().'</h2>');

                    // return redirect()->backwithErrors($validator->erors() )
                    // $errorMessage = empty($errorMessage) ? $validator->erors()->all() : $errorMessage ;
                    // throw  ValidationException($validator->erors()->all(), 1);
                }

            } //END OF FOR EACH 
            
            
        } catch (Exception $e) {

           
            if ($e->getCode() == '23000')
            {
                return response ('<p class=\'alert alert-danger\'>Duplicate entry.<br> '.$course.' has already been attributed to the student for the  semester '.$semester.' and academic year '.$academic_year .'.</p>');
            }
            return response('<h2> '.$e->getMessage().'</h2>');
        }

        return response ('<p ><ul>
            <li class=\'text-success\'>Semester '.$request->semester.' Courses ('.$codes.') for academic year '.$request->academic_year.' have been successfully attributed to student #'.$request->student_id.'
            </li><br>
            <li class=\'text-success\'>You should please proceed with filling marks for these courses if available. <a id=\'addScoreSheet\' href=\'/score_sheet\'> click to add.</a>
            </li></ul></p>');

    }


}
