<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
    public function restaurant(){
      return $this->belongsTo('App\Restaurant','restaurant_id','id');
    }
}
