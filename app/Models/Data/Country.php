<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];
    protected $appends = ['phone_code'];

    public function getPhoneCodeAttribute()	{

    	return $this->id;
    }
}
