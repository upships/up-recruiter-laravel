<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class SeamanBookType extends Model
{
	protected $guarded = [];
	
    public function country()	{

    	return $this->belongsTo('App\Models\Data\Country');
    }

    public function books()	{

    	return $this->hasMany('App\Models\Profile\SeamanBook');
    }
}
