<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class SeamanBook extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }

    public function seaman_book_type()	{

    	return $this->belongsTo('App\Models\Data\SeamanBookType');
    }

    public function country()   {

        return $this->belongsTo('App\Models\Data\Country');
    }
}
