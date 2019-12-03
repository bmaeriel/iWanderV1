<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  public function details() {
    return $this->belongsTo('App\Detail','detail_id');
  }

  public function addresses() {
    return $this->belongsTo('App\Address','address_id');
  }

  public function establishments() {
    return $this->belongsTo('App\Establishment','establishment_type_id');
  }

  public function mealTypes() {
    return $this->belongsToMany('App\MealType','restaurant_meal_type');
  }

  public function dietaryRestriction() {
    return $this->belongsToMany('App\DietaryRestriction','restaurant_dietary_restriction');
  }

  public function features() {
    return $this->belongsToMany('App\Feature','restaurant_feature');
  }

  public function cuisines() {
    return $this->belongsToMany('App\Cuisine','restaurant_cuisine');
  }

  public function business_hours() {
    return $this->hasMany('App\BusinessHour');
  }

}
