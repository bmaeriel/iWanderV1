<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietaryRestriction extends Model
{
  public function restaurants(){
    return $this->belongsToMany('App\Restaurants','restaurant_dietary_restriction','dietary_restriction_id');
  }
}
