<?php

namespace App\Models\Conversation;

use Illuminate\Database\Eloquent\Model;

class ConversationMessage extends Model
{
	protected $guarded = [];
	
    public function conversation()	{

    	return $this->belongsTo('App\Models\Conversation');
    }

    public function conversation_member()	{

    	return $this->belongsTo('App\Models\Conversation\ConversationMember');
    }
}
