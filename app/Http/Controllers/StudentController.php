<?php

namespace App\Http\Controllers;

use App\Students;
use App\course;
use App\department;

use App\Http\Requests\StudentsFormRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Exceptions\CustomException;
use App\Exceptions\ValidationException;
use Illuminate\Support\Facades\DB;
use Validator;


class StudentController extends Controller
{
    
    
    public function sanitizeString(String $str)
    {
        //returns string that is sanitize
        //dd(strip_tags(htmlspecialchars('<script>JavaScript</script>')));
        return strip_tags(htmlspecialchars($str));

    }


    /**
     * Display a listing of the resource students.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$students = Students::all();
        // $students = Students::where('student_id', '<>', " ")->orderBy('level', 'asc')->orderBy('fname', 'asc')->orderBy('sname', 'asc')->orderBy('student_id', 'asc')->get();
        
        $students = DB::table('students')
                    ->leftJoin('departments', 'departments.id', '=','students.department_id')
                    ->select('students.student_id','students.fname','students.sname','students.level','students.department_id', 'students.sex'  , 'departments.*')
                    ->get();
        $departments = Department::select('name', 'id')->distinct()->get();
        return view('students.index', compact('students','departments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $departments = Department::select('name', 'id')->distinct()->get();
        return view('students.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentsFormRequest $request)
    {


      
        $validated = $request->validated();     

        //$validated['student_id'] = strtoupper($validated['student_id']);
        $validated['fname'] = strtoupper($validated['fname']);
        $validated['sname'] = ucwords($validated['sname']);
        $validated['address'] = ucwords($validated['address']);


        $file = $request->file('image');
        $v = Validator::make(compact('file'), ['file'=>'nullable|image|mimes:jpeg,jpg,bmp,png|max:2048']);
        
        //size of file measure in kilobytes therefor 2048 = 2048 kilobyte
        try 
        {

            if ($v->fails()) {
                # code...
                return ("From:StudentController@store. Bad data");
                
            }

            $image = empty($_FILES['image']['tmp_name']) ? '': file_get_contents( $_FILES['image']['tmp_name']) ;
            $image_type = $_FILES['image']['type'];

            //$request->file('image')->getPathname().' and '.$_FILES['image']['tmp_name'] are identical


            $validated['image_type'] = $image_type;
            $validated['image'] = $image;


            $student = new Students($validated);
             $student->student_id = strtoupper($validated['student_id']);
            /*$student->image = $image;
            $student->image_type = $image_type;*/
            
         //dd($student);
            $student->save();
            
            return redirect(route('students.index', $student))->with('status', 'Student Created Successfully');
            
            
        } catch (Exception $e) {

            return 'From:StudentController@store. Bad data'.' '.$e->getMessages();
            
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    //public function show(Students $students)
    public function show($id)
    {
        //
         // dd($levels);
        $student = Students::findOrFail($id);
        $courses = DB::table('courses')->where('level', $student->level)->orderBy('cname')->distinct()->get();
        $current_ay = DB::table('infos')->where('info_name', 'academic_year')->first()->info;

         
        return view('students.show', compact('student', 'courses', 'current_ay'));

//         return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    //public function edit(Students $students)
    public function edit($id)
    
    {
        //
        $student = Students::findOrFail($id);
        $departments = Department::select('name', 'id')->distinct()->get();
        return view('students.update', compact('student', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Students $students)
    public function update(StudentsFormRequest $request, $id)
    {
       
        $student = Students::findOrFail($id);
        $validated = $request->validated();

        $student->student_id = strtoupper($validated['student_id']);
        $student->fname = strtoupper( $validated['fname']);
        $student->sname = ucwords(strtolower($validated['sname']));
        $student->department_id = $validated['department_id'];
        $student->level =  $validated['level'];
        $student->placeOfBirth = $validated['placeOfBirth'];
        $student->dateOfBirth = $validated['dateOfBirth'];
        $student->sex = $validated['sex'];
        $student->address = ucwords($validated['address']);
        $student->enrollement_date= $validated['enrollement_date'];
        $student->email = $validated['email'];

        
        $file = $request->file('image');
        $v = Validator::make(compact('file'), ['file'=>'nullable|image|mimes:jpeg,jpg,bmp,png|max:2048']);

        if($v->fails())
        {
            return 'bad data. StudentController@update';
        }


        if (!empty($_FILES['image']['tmp_name']))
        {

           $student->image  = file_get_contents( $_FILES['image']['tmp_name']);

           $student->image_type = $_FILES['image']['type'];

        }

        $student->save();

        return redirect(route('students.index'))->with('status', 'Student '.$student->student_id.' Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = Students::findOrFail($id);
        $student->delete();
        return back()->with('status', 'Delete of student '.$id.' was Successfully comleted');
    }


}
