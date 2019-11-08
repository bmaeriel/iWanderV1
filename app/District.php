<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T00:22:22+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T14:18:43+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    public function country() {
      return $this->belongsTo('App\Country','country_id');
    }

    protected $fillable = [
        'district_name', 'country_id', 'about'
    ];

    public function cities() {
      return $this->hasMany('App\City');
    }

    public function addresses() {
      return $this->hasMany('App\Address');
    }
}
