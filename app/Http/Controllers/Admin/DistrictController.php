<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T00:34:36+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T13:58:20+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\District;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $district = District::all();
      // $countries = Country::all();


      // return view('admin.districts.index', compact('countries'));
      return view('admin.districts.index')->with([
        'districts' => $district
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $countries = Country::All();
      $district = District::all();
      return view('admin.districts.create')->with([
        'countries' => $countries,
        'districts' => $district
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

      // $country = Country::all();
      $request->validate([
        'district_name' => 'required|max:191',
        'country_id' => 'required|integer',
        'about' => 'required|max:191',
        // 'view_count' => 'required|max:191'
      ]);

      $country = Country::find(1);
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
      $country = Country::findOrFail($id);
      return view('admin.districts.show')->with([
        'district' => $district,
        'country' => $country
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
      $countries = Country::All();
      $country = Country::findOrFail($id);
      return view('admin.districts.edit')->with([
        'district' => $district,
        'countries' => $countries,
        'country' => $country
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
      $country = Country::findOrFail($id);
      $district = District::findOrFail($id);

      $request->validate([
        'district_name' => 'required|max:191',
        'country_id' => 'required|integer',
        'about' => 'required|max:255'
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
