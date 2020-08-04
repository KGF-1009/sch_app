<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class score_sheet extends Model
{
    //

    public function course()
    {
    	return $this->belongsTo('App\course');
    }

    public function Students()
    {
    	return $this->belongsTo('App\Students');
    }

    protected $guarded=['id'];
}
