<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class Coc extends Model
{
    public function profile()	{

    	return $this->belongsTo('App\Models\Profile\Profile');
    }

    public function regulations()	{

    	return $this->hasMany('App\Models\Profile\CocStcwRegulation');
    }

    // public function properties()	{

    // 	// Return the properties of this Attribute in the following format:

    // 	// id: stcw regulation id
    // 	// value: stc regulation label
    // 	// country: null
    	
    // 	$values = [];

    // 	if(count($this->regulations) > 0)	{

    // 		foreach ($this->regulations as $item) {
    			
    // 			$values[] = ['id' => $item->regulation->id, 'value' => $item->regulation->regulation, 'country' => null];
    // 		}

    // 	}

    // 	return $values;
    // }
}
