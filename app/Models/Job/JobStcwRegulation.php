<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobStcwRegulation extends Model
{
    public function job()	{

    	return $this->belongsTo('App\Models\Job\Job');
    }

    public function stcw_regulation()	{

    	return $this->belongsTo('App\Models\Data\StcwRegulation');
    }
}
