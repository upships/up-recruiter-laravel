<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobShipType extends Model
{
	protected $fillable = ['job_id', 'ship_type_id', 'months'];

    public function job()	{

    	return $this->belongsTo('App\Models\Job');
    }

    public function ship_type()	{

    	return $this->belongsTo('App\Models\Data\ShipType');
    }
}
