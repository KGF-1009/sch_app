<?php

namespace App\Http\Controllers;

use App\department;
use App\teacher;
use App\Http\Requests\DepartmentStoreRequest;

use Illuminate\Http\Request;
use DB;
use Exception;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments = department::all();
        $departments = DB::table('departments')
                        ->leftJoin('teachers','teachers.id', '=','departments.teacher_id')
                        ->select('departments.*','teachers.fname', 'teachers.sname')
                        ->get();

        return view('department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teachers = Teacher::select('id','fname', 'sname','matricule')->distinct()->get();
        //used to create drop down for selecting head of department 
        //similar query in edit function below.
        return view('department.create', compact('teachers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentStoreRequest $request)
    {
        //
        $validated = $request->validated();
        $validated['name'] = strtoupper($validated['name']);
        $validated['description'] = ucwords(strtoupper($validated['description']));

        try {
            $department = new Department($validated);
            $department->save();

            return redirect(route('department.index', $department))->with('status', 'Department Created Successfully');
            
        } catch (\Exception $e) {

            return redirect(route('department.index', $department))->with('status', 'From:StudentController@store. Bad data'.' '.$e->getMessages());

            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(department $department)
    {
        //
        $teacher = teacher::findOrFail($department->teacher_id);
        return view('department.show', compact('department', 'teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(department $department)
    {
        //
        $teachers = Teacher::select('id','fname', 'sname','matricule')->distinct()->get();
        //used to create drop down for selecting head of department 
        //similar query in create function above.
        return view('department.update', compact('department', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentStoreRequest $request, department $department)
    {
        //
         $validated = $request->validated();
        $department->name = strtoupper($validated['name']);
        $department->description = ucwords(strtolower($validated['description']));
        $department->teacher_id = (int) $validated['teacher_id'];

        // dd($department->teacher_id);
        // dd(var_dump($department->teacher_id));
         $department->save();
         return redirect(route('department.index'))->with('status', $department->name.' Department  Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(department $department)
    {
        //
        try {
         
            $department->delete();
            return back()->with('status', $department->name.' department successfully deleted');

        } catch (Exception $e) {

            if( in_array('1451', $e->errorInfo))
            {
                /*Error: 1451 SQLSTATE: 2300
                (ER_NO_REFERENCED_ROW_2)
                Message: Cannot delete or update a child row: a foreign key constraint fails*/

                return back()->with('status', 'The ('.$department->name.') department has students attached to it. Please update the student table before deleting in the departments table.');
            }
            return back()->with('status', 'An error occured. Delete request failed.<br> '.$e->errorInfo());
        }
    }
}
