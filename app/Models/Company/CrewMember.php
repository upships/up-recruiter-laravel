<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class CrewMember extends Model
{
    public function company()	{

    	return $this->belongsTo('App\Models\Company\Company');
    }

    public function crew()	{

    	return $this->belongsTo('App\Models\Company\Crew');
    }

    public function profile()	{

    	return $this->belongsTo('App\Models\Profile\Profile');
    }
}
