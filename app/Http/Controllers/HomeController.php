<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\department;
use App\students;
use App\teacher;
use App\course;
use App\score_sheet;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $departments = Department::all();
        $students = students::all();
        $teachers = teacher::all();
        $courses = course::all();
        $score_sheets = score_sheet::all();
        return view('home', compact('departments', 'students','teachers', 'courses', 'score_sheets'));
    }

    public function index_vue()
    {
        return view('home_vue');
    }
}
