<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $fillable = ['name', 'logo_path', 'careers_url'];

    public function recruiters()	{

    	return $this->hasMany('App\Models\Company\Recruiter');
    }

    public function users()    {

        return $this->hasMany('App\User');
    }

    public function jobs()	{

    	return $this->hasMany('App\Models\Job');
    }

    public function selections()  {

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

    public function conversations()    {

        return $this->hasMany('App\Models\Conversation\Conversation');
    }

    public function getCareersUrlAttribute()  {

        if(!$this->careers_link)    {

            $this->careers_link = str_slug($this->name);
            $this->save();
        }

        return 'https://' . $this->careers_link . '.upships.com';
    }

    public function getLogoPathAttribute()  {

        if($this->logo)    {

            $url = Storage::get($this->logo);
        }
        else {

            $url = 'https://placehold.it/100x100';
        }

        return $url;
    }
}
