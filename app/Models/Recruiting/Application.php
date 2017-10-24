<?php

namespace App\Models\Recruiting;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    public function profile()	{

    	return $this->belongsTo('App\Models\Profile\Profile');
    }

    public function company()	{

    	return $this->belongsTo('App\Models\Company\Company');
    }

    public function job()	{

    	return $this->belongsTo('App\Models\Job\Job');
    }

    public function selection()	{

    	return $this->belongsTo('App\Models\Recruiting\Selection');
    }
}
