<?php

namespace App\Http\Controllers\Admin;
use App\Cuisine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuisineController extends Controller
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
      $cuisines = Cuisine::all();
      return view('admin.cuisines.index')->with([
        'cuisines' => $cuisines
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cuisines.create');
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
        'cuisine_name' => 'required|max:191'
      ]);

      $cuisine = new Cuisine();
      $cuisine->cuisine_name = $request->input('cuisine_name');

      $cuisine->save();

      return redirect()->route('admin.cuisines.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cuisine = Cuisine::findOrFail($id);
      return view('admin.cuisines.show')->with([
        'cuisine' => $cuisine
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
      $cuisine = Cuisine::findOrFail($id);
      return view('admin.cuisines.edit')->with([
        'cuisine' => $cuisine
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
      $cuisine = Cuisine::findOrFail($id);
      $request->validate([
        'cuisine_name' => 'required|max:191'
      ]);

      $cuisine->cuisine_name = $request->input('cuisine_name');
      $cuisine->save();

      return redirect()->route('admin.cuisines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cuisine = Cuisine::findOrFail($id);
      $cuisine->delete();
      return redirect()->route('admin.cuisines.index');
    }
}
