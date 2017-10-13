<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    //

    public function user()	{

    	return $this->belongsTo('App\User');
    }

    public function company()	{

    	return $this->belongsTo('App\Models\Company\Company');
    }
}