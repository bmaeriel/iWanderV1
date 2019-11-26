<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
  public function details() {
    return $this->hasOne('App\Detail','detail_id');
  }

  public function addresses() {
    return $this->belongsTo('App\Address','address_id');
  }

  public function categories() {
    return $this->belongsToMany('App\Category','attraction_category');
  }
}
