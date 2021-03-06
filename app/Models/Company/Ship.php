<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    public function company()	{

    	return $this->belongsTo('App\Models\Company');
    }

    public function ship_type()	{

    	return $this->belongsTo('App\Models\Data\ShipType');
    }
}
