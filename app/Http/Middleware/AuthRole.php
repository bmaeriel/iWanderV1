<?php
# @Author: maerielbenedicto
# @Date:   2019-10-22T01:00:38+01:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-10-22T01:02:20+01:00




namespace App\Http\Middleware;

use Closure;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, String $role)
     {
       if(!$request->user() || !$request->user()->hasRole($role)){
         return redirect()->route('home');
       }
         return $next($request);
     }
}
