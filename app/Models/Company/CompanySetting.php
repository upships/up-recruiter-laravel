<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    public function company()	{

    	return $this->belongsTo('App\Models\Company');
    }
}
