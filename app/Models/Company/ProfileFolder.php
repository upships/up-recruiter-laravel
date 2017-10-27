<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class ProfileFolder extends Model
{
    public function items()	{

    	return $this->hasMany('App\Models\Company\ProfileFolderItem');
    }

    public function company()	{

    	return $this->belongsTo('App\Models\Company');
    }
}
