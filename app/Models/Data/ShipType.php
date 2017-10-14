<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class ShipType extends Model
{
	protected $guarded = [];
	
    public function company()	{

    	return $this->belongsTo('App\Models\Company\Company')->withDefault();
    }
}
