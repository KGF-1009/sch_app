<?php

namespace App\Http\Controllers;

use App\score_sheet;
use App\Students;
use Illuminate\Http\Request;

use App\Http\Requests\Score_sheetFormRequest;

class ScoreSheetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $score_sheets  = score_sheet::orderBy('semester', 'asc')->orderBy('student_id', 'asc')->orderBy('course_id', 'asc')->get();
        return view('score_sheet.index', compact('score_sheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Score_sheetFormRequest $request)
    {

        dd($request->courses_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\score_sheet  $score_sheet
     * @return \Illuminate\Http\Response
     */
    public function show(score_sheet $score_sheet)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\score_sheet  $score_sheet
     * @return \Illuminate\Http\Response
     */
    public function edit(score_sheet $score_sheet)
    {
        //
        return view('score_sheet.update', compact('score_sheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\score_sheet  $score_sheet
     * @return \Illuminate\Http\Response
     */
    public function update(Score_sheetFormRequest $request, score_sheet $score_sheet)
    {
        //
        // dd($request->score); 
        $v = $request->validated();
        // dd($v);
       
        $score_sheet->student_id = $v['student_id'];
        $score_sheet->course_id = $v['course_id'];
        $score_sheet->score = $v['score'];
        $score_sheet->score_ex = $v['score_ex'];
        $score_sheet->academic_year = $v['academic_year'];
        $score_sheet->semester = $v['semester'];
        $score_sheet->confirmed = $v['confirmed'];
        $score_sheet->confirmed_ex = $v['confirmed_ex'];

       $score_sheet->save();

        $student = Students::where('student_id','=', $v['student_id'])->get();
       // dd($student);
        
        return redirect( route('students.show', $v['student_id']) )->with('status', 'Score successfully modified. click refresh on students view page to see effect.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\score_sheet  $score_sheet
     * @return \Illuminate\Http\Response 
     */
    public function destroy(score_sheet $score_sheet)
    {
        //
        $id = $score_sheet->id;       
        $score_sheet->delete();
        return redirect(route('score_sheet.index'))->with('status', 'Score '.$id.'. Course '.$score_sheet->course_id.' for Student '.$score_sheet->student_id.'  Deleted Successfully.');
    }

}
