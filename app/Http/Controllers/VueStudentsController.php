<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use Response;

class VueStudentsController extends Controller
{
    //
    public function index()
    {
    	//get all the student in the database.
    	$students = Students::select('student_id', 'fname', 'sname','level', 'sex')->orderBy('level', 'asc')->orderBy('fname', 'asc')->orderBy('sname', 'asc')->get();

    	return Response::json($students);
    }
}
