<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileDocumentRequest extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile\Profile');
    }

    public function profile_document()	{

    	return $this->belongsTo('App\Models\Profile\ProfileDocument');
    }

    public function document_type()	{

    	return $this->belongsTo('App\Models\Data\DocumentType');
    }
}
