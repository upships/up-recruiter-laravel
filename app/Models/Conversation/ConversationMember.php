<?php

namespace App\Models\Conversation;

use Illuminate\Database\Eloquent\Model;

class ConversationMember extends Model
{
	protected $guarded = [];
	
    public function messages()	{

    	return $this->hasMany('App\Models\Conversation\ConversationMessage');
    }

    public function user()	{

    	return $this->belongsTo('App\User');
    }
}
