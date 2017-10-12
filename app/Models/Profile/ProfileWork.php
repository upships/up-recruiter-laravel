<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileWork extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile\Profile');
    }

    public function position()	{

    	return $this->belongsTo('App\Models\Data\Position');
    }
}
