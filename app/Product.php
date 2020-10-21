<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  // get user
  public function user(){
    return $this->belongsTo('App\User');
  }
  //get Category
  public function category(){
    return $this->belongsTo('App\Category');
  }
  //get Brand
  public function brand(){
    return $this->belongsTo('App\Brand');
  }
}
