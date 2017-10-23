<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name'];

    public function recruiters()	{

    	return $this->hasMany('App\Models\Company\Recruiter');
    }

    public function users()    {

        return $this->hasMany('App\User');
    }

    public function jobs()	{

    	return $this->hasMany('App\Models\Job\Job');
    }

    public function selection()  {

        return $this->hasMany('App\Models\Recruiting\Selection');
    }

    public function emails()	{

    	return $this->hasMany('App\Models\Company\CompanyEmail');
    }

    public function offices()	{

    	return $this->hasMany('App\Models\Company\CompanyOffice');
    }

    public function phones()	{

    	return $this->hasMany('App\Models\Company\CompanyPhone');
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

    public function folders() {

        return $this->hasMany('App\Models\Company\ProfileFolder');
    }

    public function getLinkAttribute()  {

        if(!$this->careers_link)    {

            $this->careers_link = str_slug($this->name);
            $this->save();
        }

        return 'https://' . $this->careers_link . '.upships.com';
    }
}
