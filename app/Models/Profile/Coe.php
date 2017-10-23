<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class Coe extends Model
{
	protected $guarded = [];
	
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile\Profile');
    }
}
