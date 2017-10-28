<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class SeamanBook extends Model
{
	protected $appends = ['expiration_date', 'issue_date'];

    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }

    public function seaman_book_type()	{

    	return $this->belongsTo('App\Models\Data\SeamanBookType');
    }

    public function country()   {

        return $this->belongsTo('App\Models\Data\Country');
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
