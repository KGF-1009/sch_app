<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home_vue', 'HomeController@index_vue')->name('home_vue');

Route::resource('students', 'StudentController');

Route::resource('course', 'CourseController');

Route::resource('teacher', 'TeacherController');

Route::resource('info', 'infoController');

Route::resource('score_sheet', 'ScoreSheetController');

Route::resource('department', 'DepartmentController');

Route::post('/scoreSheet', 'AjaxScoreSheetController@store');
//attribute scores to students by fillin the score_sheet database


Route::get('/read_scoreSheet', 'AjaxScoreSheetController@read_scoreSheet');
//retrive data from score_sheet database and show.

//get student profile pic from database
Route::get('/getStudentImage/{id}', 'StudentImageController@getImage')->name('studentImage');

//get student profile pic from database
Route::get('/getTeacherImage/{id}', 'TeacherImageController@getImage')->name('TeacherImage');

Route::post('/students/refresh_student_index', 'AjaxStudentController@refreshIndexStudent')->name('refresh_student');

Route::post('/teachers/refresh_teacher_index', 'AjaxTeacherController@refreshIndexTeacher')->name('refresh_teacher');

Route::post('/teachers/assign_course', 'AjaxTeacherController@assignCourse')->name('assign_course');

Route::post('/teachers/un_assign_course', 'AjaxTeacherController@unAssignCourse')->name('unAssign_course');
//learn some vue.js
Route::view('vue', 'vue');
Route::get('/vue/all_students', 'AjaxStudentController@index');

Route::view('vue_students', 'students.vue.index');

Route::get('/vue/students', 'VueStudentsController@index');
