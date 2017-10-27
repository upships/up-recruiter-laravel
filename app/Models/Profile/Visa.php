<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    public function profile()  {

        return $this->belongsTo('App\Models\Profile');
    }
}
