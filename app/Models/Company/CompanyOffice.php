<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class CompanyOffice extends Model
{
	protected $appends = ['location'];

    public function company()	{

    	return $this->belongsTo('App\Models\Company');
    }

    public function country()	{

    	return $this->belongsTo('App\Models\Data\Country');
    }

    public function phones()	{

    	return $this->hasMany('App\Models\Company\CompanyPhone');
    }

    public function emails()	{

    	return $this->hasMany('App\Models\Company\CompanyEmail');
    }

    public function getLocationAttribute() {

        $location_items = [];

        if($this->address) {
            
            $location_items[] = $this->city;
        }

        if($this->city) {
            
            $location_items[] = $this->city;
        }

        if($this->state) {
            
            $location_items[] = $this->state;
        }

        if($this->country) {
            
            $location_items[] = $this->country->name;
        }

        if(count($location_items) > 0) {
            return implode(", ", $location_items);
        }
        else {
            return null;
        }
    }
}
