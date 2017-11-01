<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $fillable = ['name', 'url', 'logo', 'company_type_id', 'description', 'careers_link'];
    protected $appends = ['logo_path', 'careers_url', 'other_phones', 'other_emails'];

    public function recruiters()	{

    	return $this->hasMany('App\Models\Company\Recruiter');
    }

    public function users()    {

        return $this->hasMany('App\User');
    }

    public function careers_page()    {

        return $this->hasOne('App\Models\Company\Career');
    }

    public function jobs()	{

    	return $this->hasMany('App\Models\Job');
    }

    public function selections()  {

        return $this->hasMany('App\Models\Recruiting\Selection');
    }

    public function offices()	{

    	return $this->hasMany('App\Models\Company\CompanyOffice');
    }

    public function getOtherPhonesAttribute()	{

    	return $this->phones();
    }

    public function getOtherEmailsAttribute()   {

        return $this->emails();
    }


    public function scopePhones($query)  {

        return $query->where('has_office', false)->get();
    }

    public function scopeEmails($query)  {

        return $query->where('has_office', false)->get();
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

            $url = Storage::url($this->logo);
        }
        else {

            $url = 'https://placehold.it/100x100';
        }

        return $url;
    }
}
