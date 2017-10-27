<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
	protected $guarded = [];

	public function company()	{

    	return $this->belongsTo('App\Models\Company');
    }

    public function recruiter()	{

    	return $this->belongsTo('App\Models\Company\Recruiter');
    }

    public function members()	{

    	return $this->hasMany('App\Models\Conversation\ConversationMember');
    }

    public function messages()	{

    	return $this->hasMany('App\Models\Conversation\ConversationMessage');
    }

    public function getSubjectAttribute()   {

        if($this->messages()->first())  {

            $subject = $this->messages()->first()->subject;
        }
        else {

            $subject = 'Conversation started at ' . $this->created_at->format('d/m/y - h:i');
        }

        return $subject;
    }
}
