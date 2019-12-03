<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T00:34:36+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T19:23:36+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\District;

class DistrictController extends Controller
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
      $districts = District::orderBy('district_name','asc')->get();
      return view('admin.districts.index')->with([
        'districts' => $districts
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $countries = Country::orderBy('country_name', 'asc')->get();
      $districts = District::orderBy('district_name','asc')->get();
      return view('admin.districts.create')->with([
        'countries' => $countries,
        'districts' => $districts
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
        'district_name' => 'required|max:255',
        'country_id' => 'required|integer',
        'about' => 'required|max:500',
        // 'view_count' => 'required|max:191'
      ]);

      $district = new District();
      $district->district_name = $request->input('district_name');
      $district->country_id = $request->input('country_id');
      $district->about = $request->input('about');

      $district->save();

      return redirect()->route('admin.districts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $district = District::findOrFail($id);
      return view('admin.districts.show')->with([
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
      $district = District::findOrFail($id);
      $countries = Country::orderBy('country_name', 'asc')->get();
      return view('admin.districts.edit')->with([
        'district' => $district,
        'countries' => $countries
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
      $district = District::findOrFail($id);

      $request->validate([
        'district_name' => 'required|max:255',
        'country_id' => 'required|integer',
        'about' => 'required|max:500'
      ]);

      $district->district_name = $request->input('district_name');
      $district->country_id = $request->input('country_id');
      $district->about = $request->input('about');
      $district->save();

      return redirect()->route('admin.districts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $district = District::findOrFail($id);
      $district->delete();
      return redirect()->route('admin.districts.index');
    }
}
