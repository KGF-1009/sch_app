<?php

namespace App\Http\Controllers;

use App\teacher;
use App\department;
use App\course;
use App\Http\Requests\TeacherFormRequest;
use Illuminate\Http\Request;

use App\Exceptions\CustomException;
use App\Exceptions\ValidationException;
use Illuminate\Support\Facades\DB;
use Validator;

class TeacherController extends Controller
{
    public function sanitizeString(String $str)
    {
        //returns string that is sanitize
        //dd(strip_tags(htmlspecialchars('<script>JavaScript</script>')));
        return strip_tags(htmlspecialchars($str));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $teachers = Teacher::all();
        $departments = department::all()->pluck('name','id');

        return view('teacher.index', compact('teachers','departments'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function create()
    {
        //
        $departments = department::all();
        return view('teacher.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherFormRequest $request)
    {

        //validate data       
        $validated = $request->validated();
        
        $file = $request->file('image');
        $v = Validator::make(compact('file'), ['file'=>'nullable|image|mimes:jpeg,jpg,bmp,png|max:2048']);
        //size of file measure in kilobytes therefor 2048 = 2048 kilobyte

        //create new teacher
        if ($v->fails())
        {
              # code...
            return ("From:TeacherController@store. Bad data");
        }


        try {
            
            $image = empty($_FILES['image']['tmp_name']) ? '': file_get_contents( $_FILES['image']['tmp_name']);

            $image_type = $_FILES['image']['type'];

            //$request->file('image')->getPathname().' and '.$_FILES['image']['tmp_name'] are identical

            $validated['image_type'] = $image_type;

            $validated['image'] = $image;
            
            $teacher = new Teacher($validated);
            // attribute matricule is not mass assignable;
            $teacher->matricule = strtoupper($validated['matricule']);

            $teacher->fname = strtoupper($validated['fname']);
            $teacher->sname = ucwords(strtolower($validated['sname']));
            $teacher->address = ucwords($validated['address']);

            $teacher->save();
            return redirect(route('teacher.index'))->with('status', 'Teacher '.$teacher->matricule.' added Successfully');
            
        } catch (\Exception $e) {

            return $e->getMessage();
            
        }

        //end code for image





        // dd($teacher); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response 
     */
    public function show(teacher $teacher)
    {

        $departments = $teacher->departments()->get();
        //gets the departments in which teacher is HOD.

        $all_courses = Course::orderBy('level' ,'asc')->get();
        $all_courses = $all_courses->groupBy('level');

       // dd($all_courses);
        // select all course and display form showing all course in the show.blade.php

        $courses_assigned = $teacher->courses()->get();
        //get all the course thought by the teacher.

        return view('teacher.show', compact('teacher', 'departments', 'courses_assigned', 'all_courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(teacher $teacher)
    {
        //
        $departments = department::all();
        
        //so as to select the teachers department.

        return view('teacher.update', compact('teacher','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherFormRequest $request, teacher $teacher)
    {
        //

        $validated = $request->validated();

        $file = $request->file('image');

        $v = Validator::make(compact('file'), ['file'=>'nullable|image|mimes:jpeg,jpg,bmp,png|max:2048']);

        //size of file measure in kilobytes therefor 2048 = 2048 kilobyte

        //create new teacher
        if ($v->fails())
        {
              # code...
            return ("From:TeacherController@update. Bad data");
        } 

        try {
             //ignore $_FILES if it is empty.
            if (!empty($_FILES['image']['tmp_name']))
            {
                $teacher->image  = file_get_contents( $_FILES['image']['tmp_name']);
                $teacher->image_type = $_FILES['image']['type'];
            }
            
            $teacher->matricule = strtoupper($validated['matricule']);
            $teacher->fname = strtoupper($validated['fname']);
            $teacher->sname = ucwords(strtolower($validated['sname']));
            $teacher->sex = $validated['sex'];
            $teacher->role = $validated['role'];
            $teacher->department_id = $validated['department_id'];
            $teacher->diploma = $validated['diploma'];
            $teacher->nation = $validated['nation'];
            $teacher->address = ucwords(strtolower($validated['address']));            

            $teacher->save();
            return redirect(route('teacher.index'))->with('status', 'Teacher '.$teacher->matricule.' Updated Successfully');

        } catch (Exception $e) {
            
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(teacher $teacher)
    {
        //

        $matricule = $teacher->matricule;
        $teacher->delete();
        return redirect(route('teacher.index'))->with('status', 'Teacher '.$matricule.' Deleted Successfully');
    }
}
