<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobLanguage extends Model
{
    protected $guarded = [];
    protected $appends = ['level_label'];

    public function job()	{

    	return $this->belongsTo('App\Models\Job\Job');
    }

    public function language()	{

    	return $this->belongsTo('App\Models\Data\Language');
    }

    public function getLevelLabelAttribute()	{

    	switch($this->level)   {

            case 1:
                $level_label = 'Basic';
            break;

            case 2:
                $level_label = 'Intermediate';
            break;

            case 3:
                $level_label = 'Advanced';
            break;

            case 4:
            	$level_label = 'Fluent';
            break;

            default:
                $level_label = 'Not required';
        }

    	return $level_label;
    }
}
