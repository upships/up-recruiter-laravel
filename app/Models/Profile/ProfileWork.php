<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class ProfileWork extends Model
{
	protected $appends = ['duration', 'start_date', 'end_date'];

    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }

    public function position()	{

    	return $this->belongsTo('App\Models\Data\Position');
    }

    public function ships()	{

    	return $this->hasMany('App\Models\Profile\ProfileShip');
    }

    public function getStartDateAttribute()	{

    	if($this->started_at)	{

    		return (new Carbon($this->started_at))->format('d/M/Y');
    	}
    	else {

    		return null;
    	}
    }

    public function getEndDateAttribute()	{

    	if($this->ended_at)	{

    		return (new Carbon($this->ended_at))->format('d/M/Y');
    	}
    	else {

    		return null;
    	}
    }

    public function getDurationAttribute()	{

    	if($this->started_at)	{

    		$start = new Carbon($this->started_at);

    		if($this->is_current)	{
    			
    			$end = Carbon();
    		}
    		else {

    			if($this->ended_at)	{

    				$end = new Carbon($this->ended_at);
    			}
    			else {

    				$end = false;
    			}
    		}

    		if($end)	{

    			return $start->diffForHumans($end, true);
    		}
    		else {

    			return null;
    		}
    	}
    	else {

    		return null;
    	}
    }
}
