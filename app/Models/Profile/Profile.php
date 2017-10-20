<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user()	{

    	return $this->belongsTo('App\User');
    }

    public function applications()  {
        return $this->hasMany('App\Models\Recruiting\Application');
    }




    public function certificates()	{
    	return $this->hasMany('App\Models\Profile\ProfileCertificate');
    }

    public function works()	{
    	return $this->hasMany('App\Models\Profile\ProfileWork');
    }

    public function ships()	{
    	return $this->hasMany('App\Models\Profile\ProfileShip');
    }

    public function trainings()	{
    	return $this->hasMany('App\Models\Profile\ProfileTraining');
    }

    public function documents()	{
    	return $this->hasMany('App\Models\Profile\ProfileDocument');
    }

    public function document_requests()	{
    	return $this->hasMany('App\Models\Profile\ProfileDocumentRequest');
    }

    public function educations()	{
    	return $this->hasMany('App\Models\Profile\ProfileEducation');
    }

    public function extras()	{
    	return $this->hasMany('App\Models\Profile\ProfileExtra');
    }

    
    public function languages()	{
    	return $this->hasMany('App\Models\Profile\ProfileLanguage');
    }



    public function dp()	{
    	return $this->hasOne('App\Models\Profile\Dp')->withDefault();
    }

    public function book()	{
    	return $this->hasOne('App\Models\Profile\SeamanBook')->withDefault();
    }

    public function coc()	{
    	return $this->hasOne('App\Models\Profile\ProfileCoc')->withDefault();
    }

    public function stcw_regulations()	{
    	
    	return $this->hasMany('App\Models\Profile\CocStcwRegulations');
    }
}
