<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T14:00:43+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T14:21:25+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  public function country() {
    return $this->belongsTo('App\Country','country_id');
  }

  public function district() {
    return $this->belongsTo('App\District','district_id');
  }

  public function city() {
    return $this->belongsTo('App\City','city_id');
  }

  public function municipality() {
    return $this->belongsTo('App\Municipality','municipality_id');
  }
}
