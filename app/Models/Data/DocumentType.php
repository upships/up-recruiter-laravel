<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
	protected $guarded = ['company_id'];

    public function company()	{

    	return $this->belongsTo('App\Models\Company');
    }

    public function country()	{

    	return $this->belongsTo('App\Models\Data\Country');
    }
}
