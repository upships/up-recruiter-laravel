<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileExtra extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }
}
