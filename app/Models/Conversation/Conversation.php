<?php

namespace App\Models\Conversation;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
	protected $guarded = [];

	public function company()	{

    	return $this->belongsTo('App\Models\Company\Company');
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
}
