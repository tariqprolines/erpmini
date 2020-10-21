<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  //get Category
  public function client(){
    return $this->belongsTo('App\Client');
  }
  //get Brand
  public function product(){
    return $this->belongsTo('App\Product');
  }
}
