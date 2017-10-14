<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileCertificate extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile\Profile');
    }

    public function certificate()	{

    	return $this->belongsTo('App\Models\Data\CertificateType');
    }
}
