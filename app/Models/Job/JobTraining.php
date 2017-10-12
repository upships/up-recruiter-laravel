<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobTraining extends Model
{
    public function job()	{

    	return $this->belongsTo('App\Models\Job\Job');
    }

    public function training()	{

    	return $this->belongsTo('App\Models\Data\Training');
    }
}
