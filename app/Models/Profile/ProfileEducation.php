<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileEducation extends Model
{
    protected $guarded = ['profile_id'];

    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }
}
