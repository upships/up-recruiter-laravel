<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobTraining extends Model
{
	protected $fillable = ['job_id', 'training_id'];

    public function job()	{

    	return $this->belongsTo('App\Models\Job');
    }

    public function training()	{

    	return $this->belongsTo('App\Models\Data\Training');
    }
}
