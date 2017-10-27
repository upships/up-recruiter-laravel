<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileTraining extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }

    public function training()	{

    	return $this->belongsTo('App\Models\Data\Training');
    }
}
