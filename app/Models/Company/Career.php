<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
	protected $casts = [

		'settings' => 'array',
		'menu' => 'array',
		'content' => 'array'
	];

    public function company()    {

        return $this->belongsTo('App\Models\Company');
    }

}
