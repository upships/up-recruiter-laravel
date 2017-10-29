<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileLanguage extends Model
{
	protected $appends = ['level_label'];

    public function profile()	{

    	return $this->belongsTo('App\Models\Profile');
    }

    public function language()	{

    	return $this->belongsTo('App\Models\Data\Language');
    }

    public function getLevelLabelAttribute()	{

    	switch($this->level)	{

    		case 0:
    			$label = "Doesn't speak";
    		break;

    		case 1:
    			$label = 'Basic';
    		break;

    		case 2:
    			$label = 'Intermediate';
    		break;

    		case 3:
    			$label = 'Advanced';
    		break;

    		case 4:
    			$label = 'Fluent';
    		break;

    		default:
    			$label = 'Not informed';
    	}

    	return $label;
    }
}
