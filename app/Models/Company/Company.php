<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function recruiters()	{

    	return $this->hasMany('App\Models\Company\Recruiters');
    }

    public function jobs()	{

    	return $this->hasMany('App\Models\Job\Job');
    }

    public function emails()	{

    	return $this->hasMany('App\Models\Company\CompanyEmail');
    }

    public function offices()	{

    	return $this->hasMany('App\Models\Company\CompanyOffices');
    }

    public function phones()	{

    	return $this->hasMany('App\Models\Company\CompanyPhones');
    }


    public function crews()	{

    	return $this->hasMany('App\Models\Company\Crew');
    }

    public function crew_members()	{

    	return $this->hasMany('App\Models\Company\CrewMember');
    }


    public function ships()	{

    	return $this->hasMany('App\Models\Company\Ship');
    }
}
