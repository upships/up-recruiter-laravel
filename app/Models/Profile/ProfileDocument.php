<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileDocument extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }

    public function document_type()	{

    	return $this->belongsTo('App\Models\Data\DocumentType');
    }
}
