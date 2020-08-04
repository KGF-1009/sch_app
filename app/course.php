<?php  

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    //
    public function score_sheets()
    {
    	return $this->hasMany('App\score_sheet','foreign_key', 'course_id');
    }

    public function teacher()
    {
    	return $this->belongsTo('App\Teacher');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }


    

    protected $primaryKey = 'course_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded	=['course_id', 'coeff'];
}
