<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class ShipType extends Model
{
    public function company()	{

    	return $this->belongsTo('App\Models\Company\Company')->withDefault();
    }
}
