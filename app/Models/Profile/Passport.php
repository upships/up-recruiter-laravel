<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    public function profile()  {

        return $this->belongsTo('App\Models\Profile');
    }
}
