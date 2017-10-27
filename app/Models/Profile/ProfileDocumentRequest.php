<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileDocumentRequest extends Model
{
	protected $appends = ['date'];

    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }

    public function profile_document()	{

    	return $this->belongsTo('App\Models\Profile\ProfileDocument');
    }

    public function document_type()	{

    	return $this->belongsTo('App\Models\Data\DocumentType');
    }

    public function getDateAttribute()	{

    	return $this->updated_at->format('d/m/Y');
    }
}
