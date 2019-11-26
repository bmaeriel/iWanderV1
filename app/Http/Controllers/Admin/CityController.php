<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T02:54:08+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T19:21:12+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\District;
use App\City;

class CityController extends Controller
{
  public function __construct()
  {
    //to be able to use the function, need to be authorized
      $this->middleware('auth');
      $this->middleware('role:admin');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $city = City::all();

      return view('admin.cities.index')->with([
        'cities' => $city
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $districts = District::all();
      $city = City::all();
      return view('admin.cities.create')->with([
        'districts' => $districts,
        'cities' => $city
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'city_name' => 'required|max:191',
        'district_id' => 'required|integer',
        'about' => 'required|max:191'
      ]);

      $district = District::find(1);
      $city = new City();
      $city->city_name = $request->input('city_name');
      $city->district_id = $request->input('district_id');
      $city->about = $request->input('about');

      $city->save();

      return redirect()->route('admin.cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $city = City::findOrFail($id);
      $district = District::findOrFail($id);
      return view('admin.cities.show')->with([
        'city' => $city,
        'district' => $district
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $city = City::findOrFail($id);
      $districts = District::All();
      $district = District::findOrFail($id);
      return view('admin.cities.edit')->with([
        'city' => $city,
        'districts' => $districts,
        'district' => $district
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $city = City::findOrFail($id);
      $district = District::findOrFail($id);

      $request->validate([
        'city_name' => 'required|max:191',
        'district_id' => 'required|integer',
        'about' => 'required|max:255'
      ]);

      $city->city_name = $request->input('city_name');
      $city->district_id = $request->input('district_id');
      $city->about = $request->input('about');
      $city->save();

      return redirect()->route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $city = City::findOrFail($id);

      $city->delete();

      return redirect()->route('admin.cities.index');
    }

}
