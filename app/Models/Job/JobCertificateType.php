<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobCertificateType extends Model
{
    protected $fillable = ['job_id', 'certificate_type_id'];

    public function job()	{

    	return $this->belongsTo('App\Models\Job');
    }

    public function certificate_type()	{

    	return $this->belongsTo('App\Models\Data\CertificateType');
    }
}
