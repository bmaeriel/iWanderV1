<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
      $addresses = Address::All();
      $details = Detail::All();
      $establishments = Establishment::All();
      return view('admin.restaurants.create')->with([
        'addresses' => $addresses,
        'details' => $details,
        'establishments' => $establishments
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
        'detail_id' => 'required|integer',
        'address_id' => 'required|integer',
        'establishment_type_id' => 'required|integer'
      ]);

      $detail = Detail::find(1);
      $address = Address::find(1);
      $establishment = Establishment::find(1);
      $restaurant = new Restaurant();
      $restaurant->restaurant_name = $request->input('restaurant_name');
      $restaurant->detail_id = $request->input('detail_id');
      $restaurant->address_id = $request->input('address_id');
      $restaurant->establishment_type_id = $request->input('establishment_type_id');

      $restaurant->save();

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

      $detail = Detail::findOrFail($id);
      $address = Address::findOrFail($id);
      $establishment = Establishment::findOrFail($id);
      $restaurant = Restaurant::findOrFail($id);
      return view('admin.restaurants.show')->with([
        'detail' => $detail,
        'address' => $address,
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
      $addresses = Address::All();
      $details = Detail::All();
      $establishments = Establishment::All();

      $detail = Detail::findOrFail($id);
      $address = Address::findOrFail($id);
      $establishment = Establishment::findOrFail($id);
      $restaurant = Restaurant::findOrFail($id);
      return view('admin.restaurants.edit')->with([
        'addresses' => $addresses,
        'details' => $details,
        'establishments' => $establishments,
        'detail' => $detail,
        'address' => $address,
        'establishment' => $establishment,
        'restaurant' => $restaurant
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
      $addresses = Address::All();
      $details = Detail::All();
      $establishments = Establishment::All();
      $restaurant = Address::findOrFail($id);

      $request->validate([
        'restaurant_name' => 'required|max:191',
        'detail_id' => 'required|integer',
        'address_id' => 'required|integer',
        'establishment_type_id' => 'required|integer'
      ]);

      $restaurant->restaurant_name = $request->input('restaurant_name');
      $restaurant->detail_id = $request->input('detail_id');
      $restaurant->address_id = $request->input('address_id');
      $restaurant->establishment_type_id = $request->input('establishment_type_id');

      $restaurant->save();

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
