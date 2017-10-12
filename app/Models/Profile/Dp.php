<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class Dp extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile\Profile');
    }

    public function type()	{

    	return $this->belongsTo('App\Models\Data\DpType');
    }
}
