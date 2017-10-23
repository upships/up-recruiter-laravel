<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class ProfileFolderItem extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile\Profile');
    }

    public function profile_folder()	{

    	return $this->belongsTo('App\Models\Company\ProfileFolder');
    }

    public function company()	{

    	return $this->belongsTo('App\Models\Company\Company');
    }
}
