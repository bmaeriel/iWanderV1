<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T13:23:13+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T19:21:31+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\District;
use App\City;
use App\Municipality;

class MunicipalityController extends Controller
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
      $municipalities = Municipality::orderBy('municipality_name','asc')->get();
      return view('admin.municipalities.index')->with([
        'municipalities' => $municipalities
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $cities = City::orderBy('city_name','asc')->get();
      return view('admin.municipalities.create')->with([
        'cities' => $cities
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
        'municipality_name' => 'required|max:191',
        'city_id' => 'required|integer',
        'about' => 'required|max:191',
        // 'view_count' => 'required|max:191'
      ]);

      $municipality = new Municipality();
      $municipality->municipality_name = $request->input('municipality_name');
      $municipality->city_id = $request->input('city_id');
      $municipality->about = $request->input('about');

      $municipality->save();

      return redirect()->route('admin.municipalities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $municipality = Municipality::findOrFail($id);
      return view('admin.municipalities.show')->with([
        'municipality' => $municipality
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
      $municipality = Municipality::findOrFail($id);
      $cities = City::orderBy('city_name','asc')->get();
      return view('admin.municipalities.edit')->with([
        'municipality' => $municipality,
        'cities' => $cities
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
      $municipality = Municipality::findOrFail($id);

      $request->validate([
        'municipality_name' => 'required|max:191',
        'city_id' => 'required|integer',
        'about' => 'required|max:255'
      ]);

      $municipality->municipality_name = $request->input('municipality_name');
      $municipality->city_id = $request->input('city_id');
      $municipality->about = $request->input('about');
      $municipality->save();

      return redirect()->route('admin.municipalities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $municipality = Municipality::findOrFail($id);
      $municipality->delete();
      return redirect()->route('admin.municipalities.index');
    }
}
