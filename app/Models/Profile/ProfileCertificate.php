<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileCertificate extends Model
{
	protected $guarded = ['profile_id'];
	protected $appends = ['expiration_date', 'issue_date'];

    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }

    public function certificate_type()	{

    	return $this->belongsTo('App\Models\Data\CertificateType');
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
