<?php
# @Author: maerielbenedicto
# @Date:   2019-11-07T23:46:35+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T19:21:19+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;


class CountryController extends Controller
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
      $country = Country::orderBy('country_name', 'asc')->get();;
      return view('admin.countries.index')->with([
        'countries' => $country
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
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
        'country_name' => 'required|max:191',
        'about' => 'required|max:191',
        'continent' => 'required|max:191'
      ]);

      $country = new Country();
      $country->country_name = $request->input('country_name');
      $country->about = $request->input('about');
      $country->continent = $request->input('continent');

      $country->save();

      return redirect()->route('admin.countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $country = Country::findOrFail($id);
      return view('admin.countries.show')->with([
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
      $country = Country::findOrFail($id);
      return view('admin.countries.edit')->with([
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

      $request->validate([
        'country_name' => 'required|max:191',
        'about' => 'required|max:255',
        'continent' => 'required|max:191',
      ]);

      $country->country_name = $request->input('country_name');
      $country->about = $request->input('about');
      $country->continent = $request->input('continent');
      $country->save();

      return redirect()->route('admin.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $country = Country::findOrFail($id);

      $country->delete();

      return redirect()->route('admin.countries.index');
    }

    // public function getDistricts(Country $country) {
    //   return $country->districts()->select('id','name')->get();
    // }
}
