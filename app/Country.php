<?php
# @Author: maerielbenedicto
# @Date:   2019-11-07T23:20:33+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T17:56:08+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function districts() {
      return $this->hasMany('App\District', 'district_id');
    }

    public function district_cities_municipalities() {
      return $this->hasManyThrough('App\City', 'App\District','App\Municipality','App\Address');
    }
}
