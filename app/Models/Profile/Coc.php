<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class Coc extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile\Profile');
    }

    public function regulations()	{

    	return $this->hasMany('App\Models\Profile\CocStcwRegulation');
    }
}
