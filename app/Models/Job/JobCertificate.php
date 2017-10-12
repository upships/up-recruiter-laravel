<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobCertificate extends Model
{
    public function job()	{

    	return $this->belongsTo('App\Models\Job\Job');
    }

    public function certificate()	{

    	return $this->belongsTo('App\Models\Data\Certificate');
    }
}
