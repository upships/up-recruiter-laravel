<?php

namespace App\Models\Recruiting;

use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
	protected $guarded = [];
    protected $appends = ['date'];
    
    public function company()	{

    	return $this->belongsTo('App\Models\Company');
    }

    public function job()	{

    	return $this->belongsTo('App\Models\Job');
    }

    public function applications()	{

    	return $this->hasMany('App\Models\Recruiting\Application');
    }

    public function getDateAttribute()  {

        return $this->created_at->format('d/M');
    }
}
