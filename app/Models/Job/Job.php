<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function company()	{

    	return $this->belongsTo('App\Models\Company\Company');
    }

    public function country()	{

    	return $this->belongsTo('App\Models\Data\Country');
    }

    public function position()	{

    	return $this->hasOne('App\Models\Job\JobPosition');
    }

    public function benefits()	{

    	return $this->hasMany('App\Models\Job\JobBenefit');
    }

    public function ships()	{

    	return $this->hasMany('App\Models\Job\JobShipType');
    }

    public function requirements()	{

    	return $this->hasMany('App\Models\Job\JobRequirement');
    }
    
    public function experiences()	{

    	return $this->hasMany('App\Models\Job\JobExperience');
    }

    public function seaman_book_types()	{

    	return $this->hasMany('App\Models\Job\JobSeamanBookType');
    }

    public function stcw_regulations()	{

    	return $this->hasMany('App\Models\Job\JobStcwRegulation');
    }

    public function trainings()	{

    	return $this->hasMany('App\Models\Job\JobTraining');
    }

    public function certificates()	{

    	return $this->hasMany('App\Models\Job\JobCertificate');
    }


    public function applications()	{

    	return $this->hasMany('App\Models\Recruiting\Application');
    }

    public function selection()	{

    	return $this->hasOne('App\Models\Recruiting\Selection');
    }
}