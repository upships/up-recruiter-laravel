<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    public function company()	{

    	return $this->belongsTo('App\Models\Company\Company');
    }

    public function members()	{

    	return $this->hasMany('App\Models\Company\CrewMembers');
    }
}
