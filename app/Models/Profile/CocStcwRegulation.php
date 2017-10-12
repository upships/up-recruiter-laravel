<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class CocStcwRegulation extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile\Profile');
    }

    public function coc()	{

    	return $this->belongsTo('App\Models\Profile\Coc');
    }
}
