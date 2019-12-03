<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{
  public function restaurants(){
    return $this->belongsToMany('App\Restaurants','restaurant_meal_type','meal_type_id');
  }
}
