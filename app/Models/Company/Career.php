<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Career extends Model
{
	protected $casts = [

		'settings' => 'array',
		'menus' => 'array',
		'content' => 'array',
		'images' => 'array',
		'slides' => 'array',
	];

	protected $appends = ['image_path', 'sections'];

	protected $fillable = ['menus', 'settings', 'content', 'images', 'slides'];

    public function company()    {

        return $this->belongsTo('App\Models\Company');
    }

    public function getImagePathAttribute()	{

    	return Storage::url('');
    }

		public function getSectionsAttribute()	{
			return $this->content;
		}

}
