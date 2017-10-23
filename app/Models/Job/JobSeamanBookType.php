<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobSeamanBookType extends Model
{
	protected $fillable = ['job_id', 'seaman_book_type_id'];

    public function job()	{

    	return $this->belongsTo('App\Models\Job\Job');
    }

    public function seaman_book_type()	{

    	return $this->belongsTo('App\Models\Data\SeamanBookType');
    }
}
