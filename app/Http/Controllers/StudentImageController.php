<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\students;

class StudentImageController extends Controller
{
    public function getImage($id)
    {
    	//here am using name routes and parameter in get request to get id of student
    	//Route::get('/getImage/{id}', 'StudentImageController@getImage')->name('studentImage')

    	$v = Validator::make(['id'=>$id], ['id'=>'bail|required|string']);
    	if ($v->fails()) {
    		return '<h1>Bad data</h1>';
    		# code...
    	}

    	$student = Students::findOrFail($id);
    	$image = $student->image;
    	$image_type = $student->image_type;

    	return response($image)->header('Content-Type', $image_type);

    }
}
    	//dd('<h1>StudentImageController@getImage</h1>');
