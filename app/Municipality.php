<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T13:18:21+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T14:20:43+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
  public function city() {
    return $this->belongsTo('App\City');
  }

  public function addresses() {
    return $this->hasMany('App\Address');
  }
}
