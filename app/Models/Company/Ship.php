<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    public function company()	{

    	return $this->belongsTo('App\Models\Company\Company');
    }

    public function type()	{

    	return $this->belongsTo('App\Models\Data\ShipType');
    }
}
