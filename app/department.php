<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    //all the fills are now mass assigned except id.
    protected $guarded = ['id'];

    public function students(){

    	return $this->hasMany('App\students', 'foreign_key', 'department_id');
    }

    public function teacher(){

    	return $this->belongsTo('App\teacher');
    	//the teacher is the Hod of a department
    }
    public function courses(){

    	return $this->hasMany('App\Course');
    }

}
