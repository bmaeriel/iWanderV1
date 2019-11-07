<?php
# @Author: maerielbenedicto
# @Date:   2019-10-22T00:38:16+01:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-10-22T00:45:14+01:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function users() {
      return $this->belongsToMany('App\User','user_role');
    }
}
