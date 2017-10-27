<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileLanguage extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }

    public function language()	{

    	return $this->belongsTo('App\Models\Data\Language');
    }
}
