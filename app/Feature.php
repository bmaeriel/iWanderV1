<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
  public function restaurants(){
    return $this->belongsToMany('App\Restaurants','restaurant_feature','feature_id');
  }
}
