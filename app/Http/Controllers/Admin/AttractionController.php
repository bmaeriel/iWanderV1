<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttractionController extends Controller
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
      $attractions = Attraction::all();
      return view('admin.attractions.index')->with([
        'attractions' => $attractions
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $details = Detail::All();
      $addresses = Address::All();
      return view('admin.attractions.create')->with([
        'details' => $details,
        'addresses' => $addresses
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
        'attraction_name' => 'required|max:191',
        'detail_id' => 'required|integer',
        'address_id' => 'required|integer',
        'rec_duration' => 'required|integer'
      ]);

      $detail = Detail::find(1);
      $address = Address::find(1);
      $attractions = new Attraction();
      $attraction->attraction_name = $request->input('attraction_name');
      $attraction->detail_id = $request->input('detail_id');
      $attraction->address_id = $request->input('address_id');
      $attraction->rec_duration = $request->input('rec_duration');

      $attraction->save();

      return redirect()->route('admin.attractions.index');
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
      $attraction = Attraction::findOrFail($id);
      return view('admin.attractions.show')->with([
        'detail' => $detail,
        'address' => $address,
        'attraction' => $attraction
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
      $details = Detail::All();
      $addresses = Address::All();

      $detail = Detail::findOrFail(1);
      $address = Address::findOrFail(1);
      $attraction = Attraction::findOrFail($id);
      return view('admin.attractions.edit')->with([
        'details' => $details,
        'addresses' => $addresses,
        'detail' => $detail,
        'attraction' => $attraction,
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
      $request->validate([
        'attraction_name' => 'required|max:191',
        'detail_id' => 'required|integer',
        'address_id' => 'required|integer',
        'rec_duration' => 'required|max:20'
      ]);

      $detail = Detail::find(1);
      $address = Address::find(1);
      $attractions = Attraction::find($id);
      $attraction->attraction_name = $request->input('attraction_name');
      $attraction->detail_id = $request->input('detail_id');
      $attraction->address_id = $request->input('address_id');
      $attraction->rec_duration = $request->input('rec_duration');

      $attraction->save();

      return redirect()->route('admin.attractions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $aatraction = Attraction::findOrFail($id);
      $aatraction->delete();
      return redirect()->route('admin.attractions.index');
    }
}
