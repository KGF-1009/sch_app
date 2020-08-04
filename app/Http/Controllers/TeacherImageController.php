<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teacher;
use Validator;

class TeacherImageController extends Controller
{
    //
        public function getImage($id)
    {
        //here am using name routes and parameter in get request to get id of student
        //Route::get('/getImage/{id}', 'StudentImageController@getImage')->name('studentImage')

        $v = Validator::make(['id'=>$id], ['id'=>'bail|required|string']);
        if ($v->fails()) {
            return '<h1>Bad data</h1>';
            # code...
        }
    	$teacher = Teacher::findOrFail($id);
    	$image = $teacher->image;
    	$image_type = $teacher->image_type;

    	return response($image)->header('Content-Type', $image_type);
    

    }
}
