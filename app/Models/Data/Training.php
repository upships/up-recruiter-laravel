<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    public function company()	{

    	return $this->belongsTo('App\Models\Company\Company');
    }

    public function country()	{

    	return $this->belongsTo('App\Models\Data\Country');
    }
}
