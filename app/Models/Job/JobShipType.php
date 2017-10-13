<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobShipType extends Model
{
    public function job()	{

    	return $this->belongsTo('App\Models\Job\Job');
    }

    public function ship()	{

    	return $this->belongsTo('App\Models\Data\ShipType');
    }
}