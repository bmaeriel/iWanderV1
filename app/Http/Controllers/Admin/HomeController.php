<?php
# @Author: maerielbenedicto
# @Date:   2019-10-22T00:56:39+01:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-10-22T00:59:11+01:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
    //to be able to use the function, need to be authorized
      $this->middleware('auth');
      $this->middleware('role:admin');
  }

  public function index() {
    return view('admin.home');
  }
}
