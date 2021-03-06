<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobExperience extends Model
{
	protected $fillable = ['job_id', 'value'];

    public function job()	{

    	return $this->belongsTo('App\Models\Job');
    }
}
