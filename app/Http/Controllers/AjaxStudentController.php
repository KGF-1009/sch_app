<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\score_sheet;
use App\teacher;
use Illuminate\Support\Facades\DB;
use Response;

class AjaxStudentController extends Controller
{
    //

    public function index()
    {

         $scores = score_sheet::orderBy('semester', 'desc')->orderBy('student_id', 'desc')->get();

         // dd($scores);
         //return response()->json(['status' => 'error'], 500);
        return Response::json($scores);
    }

    public function refreshIndexStudent(Request $request)
    {
        
        $students = DB::table('students')
                        ->where('student_id', 'like', '%'.$request->tbl_student_id.'%')
                        ->where('fname', 'like', '%'.$request->tbl_fname.'%')
                        ->where('sname', 'like', '%'.$request->tbl_sname.'%')
                        ->where('level', 'like', '%'.$request->tbl_level.'%')
                        ->where('department_id', 'like', '%'.$request->tbl_department_id.'%')
                        ->leftJoin('departments', 'departments.id', '=','students.department_id')
                        ->select('students.student_id','students.fname','students.sname','students.level','students.department_id', 'students.sex', 'departments.*')
                        ->get();
        // dd($students->toSql(), $students->getBindings());
                        // dd($students);

        return view('shared.indexStudentTable', compact('students'));
    }

    public function getScores(Request $request)
    {

    	
    	
    	$student = Students::findOrFail($request->id);

    	/*$student = Students::where('student_id', $request->id)->get() give a collection of student*/

    	//return response('<i> You are doing well '.$student->fname.'</i>');
    	$data ='';
    	$data .= "<tr><td>".$student->student_id."</td>
    	<td>".$student->fname."</td>
    	<td>".$student->sname."</td>
    	<td>".$student->level."</td>
    	<td>".$student->address."</td>
    	</tr>";
    	return response($data);
    	
    }
}
