<?php

namespace App\Models\Recruiting;

use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    public function company()	{

    	return $this->belongsTo('App\Models\Company\Company');
    }

    public function job()	{

    	return $this->belongsTo('App\Models\Job\Job');
    }

    public function applications()	{

    	return $this->hasMany('App\Models\Recruiting\Application');
    }
}
