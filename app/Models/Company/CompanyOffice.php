<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class CompanyOffice extends Model
{
    public function company()	{

    	return $this->belongsTo('App\Models\Company');
    }
}
