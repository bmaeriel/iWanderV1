<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T02:43:26+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T14:19:17+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  public function district() {
    return $this->belongsTo('App\District');
  }

  public function municipalities() {
    return $this->hasMany('App\Municipality');
  }

  public function addresses() {
    return $this->hasMany('App\Address');
  }
}
