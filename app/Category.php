<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  // Get User
  public function user(){
    return $this->hasOne('APP\User','id','user_id');
  }
}
