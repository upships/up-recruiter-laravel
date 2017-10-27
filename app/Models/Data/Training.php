<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
	protected $guarded = [];
	
    public function company()	{

    	return $this->belongsTo('App\Models\Company');
    }

    public function country()	{

    	return $this->belongsTo('App\Models\Data\Country');
    }
}
