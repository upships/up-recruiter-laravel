<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class CompanyPhone extends Model
{
	public function company()	{

    	return $this->belongsTo('App\Models\Company');
    }

    public function office()	{

    	return $this->belongsTo('App\Models\Company\CompanyOffice');
    }
}
