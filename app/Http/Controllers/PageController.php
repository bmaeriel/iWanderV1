<?php
# @Author: maerielbenedicto
# @Date:   2019-11-07T21:24:23+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-07T21:37:07+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome() {
      return view('welcome');
    }

    public function about() {
      return view('about');
    }
}
