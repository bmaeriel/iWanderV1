<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T19:11:51+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T19:29:59+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
  // public function attractions() {
  //   return $this->belongsTo('App\Detail','detail_id');
  // }

  public function restaurants() {
    return $this->hasOne('App\Restaurant');
  }
}
