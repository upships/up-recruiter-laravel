<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileShip extends Model
{
    protected $guarded = ['profile_id'];

    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }

    public function profile_work()	{

    	return $this->belongsTo('App\Models\Profile\ProfileWork');
    }

    public function ship_type()	{

    	return $this->belongsTo('App\Models\Data\ShipType');
    }
}
