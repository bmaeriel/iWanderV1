<?php

namespace App\Http\Controllers\Admin;
use App\DietaryRestriction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DietaryRestrictionController extends Controller
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
      $dietaryRestrictions = DietaryRestriction::all();
      return view('admin.dietaryrestrictions.index')->with([
        'dietaryRestrictions' => $dietaryRestrictions
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.dietaryrestrictions.create');
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
        'dietary_restriction_name' => 'required|max:191'
      ]);

      $dietaryRestriction = new DietaryRestriction();
      $dietaryRestriction->dietary_restriction_name = $request->input('dietary_restriction_name');

      $dietaryRestriction->save();

      return redirect()->route('admin.dietaryrestrictions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $dietaryRestriction = DietaryRestriction::findOrFail($id);
      return view('admin.dietaryrestrictions.show')->with([
        'dietaryRestriction' => $dietaryRestriction
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
      $dietaryRestriction = DietaryRestriction::findOrFail($id);
      return view('admin.dietaryrestrictions.edit')->with([
        'dietaryRestriction' => $dietaryRestriction
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
      $dietaryRestriction = DietaryRestriction::findOrFail($id);

      $request->validate([
        'dietary_restriction_name' => 'required|max:191'
      ]);

      $dietaryRestriction->dietary_restriction_name = $request->input('dietary_restriction_name');
      $dietaryRestriction->save();

      return redirect()->route('admin.dietaryrestrictions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $dietaryRestriction = DietaryRestriction::findOrFail($id);
      $dietaryRestriction->delete();
      return redirect()->route('admin.dietaryrestrictions.index');
    }
}
