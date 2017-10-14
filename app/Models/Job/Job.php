<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['position_id', 'ship_type_id', 'instructions', 'status', 'step', 'expires_on', 'description', 'rotation', 'slug', 'salary', 'visibility'];

    public function company()	{

    	return $this->belongsTo('App\Models\Company\Company');
    }

    public function recruiter() {

        return $this->belongsTo('App\Models\Company\Recruiter');
    }

    public function country()	{

    	return $this->belongsTo('App\Models\Data\Country');
    }

    public function position()	{

    	return $this->belongsTo('App\Models\Data\Position');
    }

    public function benefits()	{

    	return $this->hasMany('App\Models\Job\JobBenefit');
    }

    public function ship_type() {

        return $this->belongsTo('App\Models\Data\ShipType');
    }

    public function requirements()	{

    	return $this->hasMany('App\Models\Job\JobRequirement');
    }

    public function ship_requirements()    {

        return $this->hasMany('App\Models\Job\JobShipType');
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

    public function certificate_types()	{

    	return $this->hasMany('App\Models\Job\JobCertificateType');
    }


    public function applications()	{

    	return $this->hasMany('App\Models\Recruiting\Application');
    }

    public function selection()	{

    	return $this->hasOne('App\Models\Recruiting\Selection');
    }


}