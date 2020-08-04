<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //
    public function department(){

        return $this->belongsTo('App\department');  
    }
    public function score_sheets()
    {
    	return $this->hasMany('App\score_sheet', 'foreign_key', 'student_id');
    }
    
    protected $primaryKey = 'student_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
    //by declaring an empty array for guarded, this makes all the field fillable
}
