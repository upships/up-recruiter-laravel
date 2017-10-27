<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileCertificate extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }

    public function certificate_type()	{

    	return $this->belongsTo('App\Models\Data\CertificateType');
    }
}
