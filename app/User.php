<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()   {

        return $this->hasOne('App\Models\Profile');
    }

    public function company()   {

        return $this->belongsTo('App\Models\Company');
    }

    public function recruiter()   {

        return $this->hasOne('App\Models\Company\Recruiter');
    }
}
