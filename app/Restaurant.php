<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  public function details() {
    return $this->hasOne('App\Detail','detail_id');
  }

  public function addresses() {
    return $this->hasOne('App\Address','address_id');
  }

  public function establishments() {
    return $this->belongsTo('App\Establishment','establishment_type_id');
  }
}
