<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    //all the fills are now mass assigned.
    protected $guarded	= ['id'];


   public function courses()
   {
   		//one teacher can teacher many courses
   		return $this->hasMany('App\course');
   }

   public function departments()
   {
   	 return $this->hasMany('App\department');
   	 //one teacher can the head of more than one department
   }
}
