<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T14:35:23+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T19:28:22+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\District;
use App\Municipality;
use App\City;
use App\Address;

class AddressController extends Controller
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
      $address = Address::all();
      return view('admin.addresses.index')->with([
        'addresses' => $address
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
      $cities = City::orderBy('city_name','asc')->get();
      $municipalities = Municipality::orderBy('municipality_name','asc')->get();
      return view('admin.addresses.create')->with([
        'countries' => $countries,
        'districts' => $districts,
        'cities' => $cities,
        'municipalities' => $municipalities
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
        'address1' => 'required|max:191',
        'address2' => 'max:191',
        'address3' => 'max:191',
        'city_id' => 'required|integer',
        'district_id' => 'required|integer',
        'postal_code' => 'numeric|min:0',
        'country_id' => 'required|integer'
      ]);

      $municipality = Municipality::find(1);
      $city = City::find(1);
      $district = District::find(1);
      $country = Country::find(1);
      $address = new Address();
      $address->address1 = $request->input('address1');
      $address->address2 = $request->input('address2');
      $address->address3 = $request->input('address3');
      $address->municipality_id = $request->input('municipality_id');
      $address->city_id = $request->input('city_id');
      $address->district_id = $request->input('district_id');
      $address->postal_code = $request->input('postal_code');
      $address->country_id = $request->input('country_id');

      $address->save();

      return redirect()->route('admin.addresses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('admin.addresses.show')->with([
        'address' => $address
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
      $countries = Country::All();
      $districts = District::All();
      $cities = City::All();
      $municipalities = Municipality::All();

      $address = Address::findOrFail($id);
      return view('admin.addresses.edit')->with([
        'countries' => $countries,
        'districts' => $districts,
        'cities' => $cities,
        'municipalities' => $municipalities,
        'address' => $address
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
      $address = Address::find($id);

      $request->validate([
        'address1' => 'required|max:191',
        'address2' => 'max:191',
        'address3' => 'max:191',
        'city_id' => 'required|integer',
        'district_id' => 'required|integer',
        'postal_code' => 'numeric|min:0',
        'country_id' => 'required|integer'
      ]);

      $address->address1 = $request->input('address1');
      $address->address2 = $request->input('address2');
      $address->address3 = $request->input('address3');
      $address->municipality_id = $request->input('municipality_id');
      $address->city_id = $request->input('city_id');
      $address->district_id = $request->input('district_id');
      $address->postal_code = $request->input('postal_code');
      $address->country_id = $request->input('country_id');

      $address->save();

      return redirect()->route('admin.addresses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $address = Address::findOrFail($id);
      $address->delete();
      return redirect()->route('admin.addresses.index');
    }
}
