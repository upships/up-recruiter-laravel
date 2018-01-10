<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class Dp extends Model
{
	protected $guarded = ['profile_id'];
	protected $appends = ['expiration_date', 'issue_date'];

    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }

    public function dp_type()	{

    	return $this->belongsTo('App\Models\Data\DpType');
    }

    public function getExpirationDateAttribute()    {

        if($this->expires_at)   {

            $date = new \Carbon\Carbon($this->expires_at);

            return $date->format('d/m/Y');
        }

        return null;
    }

    public function getIssueDateAttribute()    {

        if($this->issued_at)   {

            $date = new \Carbon\Carbon($this->issued_at);

            return $date->format('d/m/Y');
        }

        return null;
    }
}
