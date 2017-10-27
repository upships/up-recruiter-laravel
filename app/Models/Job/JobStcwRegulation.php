<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobStcwRegulation extends Model
{
	protected $fillable = ['job_id', 'stcw_regulation_id'];

    public function job()	{

    	return $this->belongsTo('App\Models\Job');
    }

    public function stcw_regulation()	{

    	return $this->belongsTo('App\Models\Data\StcwRegulation');
    }

    public function getRegulationAttribute()	{

    	return $this->stcw_regulation->regulation;
    }
}
