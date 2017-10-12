<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class SeamanBookType extends Model
{
    public function country()	{

    	return $this->belongsTo('App\Models\Data\Country');
    }
}
