<?php

namespace App\Http\Controllers\Admin;
use App\BusinessHour;
use App\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
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
      $businessHours = BusinessHour::all();
      return view('admin.businesshours.index')->with([
        'businessHours' => $businessHours
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        return view('admin.businesshours.create')->with([
          'restaurants' => $restaurants
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
        'restaurant_id' => 'required|integer',
        'day' => 'required|max:191',
        'open_time' => 'required|date_format:H:i',
        'close_time' => 'required|date_format:H:i'
      ]);

      $businessHour = new BusinessHour();
      $businessHour->restaurant_id = $request->input('restaurant_id');
      $businessHour->day = $request->input('day');
      $businessHour->open_time = $request->input('open_time');
      $businessHour->close_time = $request->input('close_time');
      $businessHour->save();

      return redirect()->route('admin.businesshours.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $businessHour = BusinessHour::findOrFail($id);
      return view('admin.businesshours.show')->with([
        'businessHour' => $businessHour
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
      $restaurants = Restaurant::all();
      $businessHour = BusinessHour::findOrFail($id);
      return view('admin.businesshours.edit')->with([
        'businessHour' => $businessHour,
        'restaurants' => $restaurants
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
      $businessHour = BusinessHour::findOrFail($id);

      $request->validate([
        'restaurant_id' => 'required|integer',
        'day' => 'required|max:191',
        'open_time' => 'required',
        'close_time' => 'required'
      ]);

      $businessHour->restaurant_id = $request->input('restaurant_id');
      $businessHour->day = $request->input('day');
      $businessHour->open_time = $request->input('open_time');
      $businessHour->close_time = $request->input('close_time');
      $businessHour->save();

      return redirect()->route('admin.businesshours.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $businessHour = BusinessHour::findOrFail($id);
      $businessHour->delete();
      return redirect()->route('admin.businesshours.index');
    }
}
