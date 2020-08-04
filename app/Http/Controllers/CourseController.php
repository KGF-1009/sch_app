<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\CustomException;

use App\Http\Requests\CourseStoreRequest;
use App\course;
use App\teacher;
use App\Students;
use App\department;
use DB;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //left outer join course and teachers table
         $courses = Course::where('course_id', '<>', " ")->orderBy('level', 'asc')->orderBy('cname', 'asc')->get();

         $courses = DB::table('courses')->leftJoin('teachers', 'courses.teacher_id', '=', 'teachers.id')->select('courses.*', 'teachers.id', 'teachers.fname', 'teachers.sname')->get();


        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $teachers = teacher::all();
        $departments = department::all();
        return view('course.create', compact('teachers','departments','teachers01'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStoreRequest $request)
    {
        //

        $validated = $request->validated();

        $course = new Course($validated);

        $course->course_id = strtoupper($validated['course_id']);
        $course->coeff = $validated['coeff'];
        $course->cname = ucwords(strtolower($course->cname));
        
        // dd($course);
        $course->save();
        return redirect(route('course.index'))->with('status', 'Course #'.$course->course_id.' Succeffully Created');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $course = Course::findOrFail($id);
         return view('course.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try {
            $course = course::findOrFail($id);
            $teachers = teacher::all();
            $departments = department::all();
            return view('course.update', compact('course', 'teachers', 'departments', 'teachers01'));
            
        } catch (\Exception $e) {

            echo $e->getMessage();
            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseStoreRequest $request, $id)
    {
        //
        $validated = $request->validated();

        $course = Course::findOrFail($id);
        $course->course_id = strtoupper($validated['course_id']);
        $course->cname = ucwords(strtolower($validated['cname']));
        $course->teacher_id = $validated['teacher_id'];
        $course->coeff = $validated['coeff'];
        $course->level = $validated['level'];
        $course->department_id = $validated['department_id'];
    

        $course->save();
        return redirect(route('course.index'))->with('status', 'Course '.$course->course_id.' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {

            $course = Course::findOrFail($id);
            $course->delete();

            $courses = Course::all();
            return view('course.index')->with('courses', $courses);
            
        } catch (\Exception $e) {
            echo $e->getMessage();
            
        }
    }
}
