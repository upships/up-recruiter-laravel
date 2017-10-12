<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobRequirement extends Model
{
    public function job()	{

    	return $this->belongsTo('App\Models\Job\Job');
    }
}
