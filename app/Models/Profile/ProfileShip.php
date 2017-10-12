<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileShip extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile\Profile');
    }

    public function work()	{

    	return $this->belongsTo('App\Models\Profile\ProfileWork');
    }

    public function type()	{

    	return $this->belongsTo('App\Models\Data\ShipType');
    }
}
