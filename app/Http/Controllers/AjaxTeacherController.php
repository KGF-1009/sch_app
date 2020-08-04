<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Department;
use App\Course;
use App\Teacher;
use Validator;

class AjaxTeacherController extends Controller
{
    //
    public function refreshIndexTeacher(Request $request)
    {
        //dd($request->tbl_teacher_id);
        $teachers = DB::table('teachers')
        				->where('matricule', 'like', '%'.$request->tbl_teacher_id.'%')
        				->where('fname', 'like', '%'.$request->tbl_fname.'%')
        				->where('sname', 'like', '%'.$request->tbl_sname.'%')
        				->where('role', 'like', '%'.$request->tbl_role.'%')
        				->where('department_id', 'like', '%'.$request->tbl_department_id.'%')
        				->select('id', 'matricule','fname','sname','department_id','role','sex')
        				->get();
        //dd($request->tbl_department_id);
        //dd($teachers->toSql(), $teachers->getBindings());
        $departments = department::all()->pluck('name','id');

        return view('shared.indexTeacherTable', compact('teachers','departments'));
    }

    public function assignCourse(Request $request)
    {
         //dd($request->teacher_id);
        try {
            foreach ($request->assigned_course_id as $value) {
           //     dd($value);
                # code...
                $validator = Validator::make(compact('value'), ['value' => 'required|min:2|max:8']);

                if($validator->fails())
                {
                    return 'Invalid data';
                }

                $course = Course::where('course_id', $value)->update(['teacher_id' => $request->teacher_id] );
            }

            //refresh the section containing the list of courses assigned to the teacher
            $teacher = Teacher::findOrFail($request->teacher_id);
            $courses_assigned = $teacher->courses()->get();

            return view('teacher.assignedCourseSection', compact('courses_assigned'));
            
        } catch (\Exception $e) {
            return '<div>'.$e->getMessage().'</div>';
            
        }
    }

    public function unAssignCourse(Request $request)
    {
        try {
            //code...
            $course_id = $request->course_id;
            $validator = Validator::make(compact('course_id'), ['course_id' => 'required|min:2|max:8']);

                if($validator->fails())
                {
                    return 'Invalid data';
                }
            $course = Course::where('course_id' , $request->course_id)->update(['teacher_id' => NULL]);
            $msg = '<div>Course unassigned successfully';

            //refresh the section containing the list of courses assigned to the teacher
            $teacher = Teacher::findOrFail($request->teacher_id);
            $courses_assigned = $teacher->courses()->get();

            return view('teacher.assignedCourseSection', compact('courses_assigned'));

        } catch (App\Exception $e) {
            //throw $th;
            return '<div>An error occured.<br>'.$e->getMessage().'</div>';

        }

       
    }
}
