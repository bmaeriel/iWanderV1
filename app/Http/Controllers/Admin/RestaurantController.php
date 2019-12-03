<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Address;
use App\Detail;
use App\Establishment;
use App\Country;
use App\City;
use App\Municipality;
use App\District;
use App\Cuisine;

class RestaurantController extends Controller
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
      $restaurants = Restaurant::all();
      return view('admin.restaurants.index')->with([
        'restaurants' => $restaurants

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
      $establishments = Establishment::orderBy('establishment_name','asc')->get();
      $cuisines = Cuisine::orderBy('cuisine_name','asc')->get();
      return view('admin.restaurants.create')->with([
        'countries' => $countries,
        'districts' => $districts,
        'cities' => $cities,
        'municipalities' => $municipalities,
        'establishments' => $establishments,
        'cuisines' => $cuisines
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
        'restaurant_name' => 'required|max:191',
        'establishment_type_id' => 'required|integer',
        'address1' => 'required|max:191',
        'address2' => 'max:191',
        'address3' => 'max:191',
        'city_id' => 'required|integer',
        'district_id' => 'required|integer',
        'postal_code' => 'numeric|min:0',
        'country_id' => 'required|integer',
        'description' => 'required|max:255',
        'website' => 'required|max:50',
        'email' => 'required|max:191|email',
        'phone' => 'required|max:13',
        'min_price' => 'numeric',
        'max_price' => 'numeric'
      ]);

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

      $detail = new Detail();
      $detail->description = $request->input('description');
      $detail->website = $request->input('website');
      $detail->email = $request->input('email');
      $detail->phone = $request->input('phone');
      $detail->min_price = $request->input('min_price');
      $detail->max_price = $request->input('max_price');
      $detail->save();

      // $establishment = Establishment::find(1);
      $restaurant = new Restaurant();
      $restaurant->restaurant_name = $request->input('restaurant_name');
      $restaurant->detail_id = $detail->id;
      $restaurant->address_id = $address->id;
      $restaurant->establishment_type_id = $request->input('establishment_type_id');
      $cuisine = $request->input('cuisine_id');
      // dd($cuisine);
      $restaurant->save();
      $restaurant->cuisines()->attach($cuisine);

      return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $establishment = Establishment::findOrFail(1);
      $restaurant = Restaurant::findOrFail($id);
      return view('admin.restaurants.show')->with([
        'establishment' => $establishment,
        'restaurant' => $restaurant
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
      $countries = Country::orderBy('country_name', 'asc')->get();
      $districts = District::orderBy('district_name','asc')->get();
      $cities = City::orderBy('city_name','asc')->get();
      $municipalities = Municipality::orderBy('municipality_name','asc')->get();
      $establishments = Establishment::orderBy('establishment_name','asc')->get();
      $cuisines = Cuisine::orderBy('cuisine_name','asc')->get();

      // dd($establishments);
      $restaurant = Restaurant::findOrFail($id);
      return view('admin.restaurants.edit')->with([
        'countries' => $countries,
        'districts' => $districts,
        'cities' => $cities,
        'municipalities' => $municipalities,
        'establishments' => $establishments,
        'restaurant' => $restaurant,
        'cuisines' => $cuisines
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
      $restaurant = Restaurant::findOrFail($id);
      $detail = Detail::findOrFail(1);
      $address = Address::findOrFail(1);

      $request->validate([
        'restaurant_name' => 'required|max:191',
        'establishment_type_id' => 'required|integer',
        'address1' => 'required|max:191',
        'address2' => 'max:191',
        'address3' => 'max:191',
        'city_id' => 'required|integer',
        'district_id' => 'required|integer',
        'postal_code' => 'numeric|min:0',
        'country_id' => 'required|integer',
        'description' => 'required|max:255',
        'website' => 'required|max:50',
        'email' => 'required|max:191|email',
        'phone' => 'required|max:13',
        'min_price' => 'numeric',
        'max_price' => 'numeric'
      ]);

      $restaurant->restaurant_name = $request->input('restaurant_name');
      $restaurant->addresses->address1 = $request->input('address1');
      $restaurant->addresses->address2 = $request->input('address2');
      $restaurant->addresses->address3 = $request->input('address3');
      $restaurant->addresses->municipality_id = $request->input('municipality_id');
      $restaurant->addresses->city_id = $request->input('city_id');
      $restaurant->addresses->district_id = $request->input('district_id');
      $restaurant->addresses->postal_code = $request->input('postal_code');
      $restaurant->addresses->country_id = $request->input('country_id');
      $restaurant->details->description = $request->input('description');
      $restaurant->details->website = $request->input('website');
      $restaurant->details->email = $request->input('email');
      $restaurant->details->phone = $request->input('phone');
      $restaurant->details->min_price = $request->input('min_price');
      $restaurant->details->max_price = $request->input('max_price');
      $restaurant->restaurant_name = $request->input('restaurant_name');
      $restaurant->detail_id = $detail->id;
      $restaurant->address_id = $address->id;
      $restaurant->establishment_type_id = $request->input('establishment_type_id');
      $cuisine = $request->input('cuisine_id');
      // dd($cuisine);
      $restaurant->addresses->save();
      $restaurant->details->save();
      $restaurant->save();
      $restaurant->cuisines()->attach($cuisine);

      return redirect()->route('admin.restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $restaurant = Restaurant::findOrFail($id);
      $restaurant->delete();
      return redirect()->route('admin.restaurants.index');
    }
}
