<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // Get User
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
