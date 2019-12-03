<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MealType;

class MealTypeController extends Controller
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
      $mealTypes = MealType::all();
      return view('admin.mealtypes.index')->with([
        'mealtypes' => $mealTypes
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mealtypes.create');
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
        'meal_type_name' => 'required|max:191'
      ]);

      $mealType = new MealType();
      $mealType->meal_type_name = $request->input('meal_type_name');

      $mealType->save();

      return redirect()->route('admin.mealtypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $mealType = MealType::findOrFail($id);
      return view('admin.mealtypes.show')->with([
        'mealType' => $mealType
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
      $mealType = MealType::findOrFail($id);
      return view('admin.mealtypes.edit')->with([
        'mealType' => $mealType
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
      $mealType = MealType::findOrFail($id);

      $request->validate([
        'meal_type_name' => 'required|max:191'
      ]);

      $mealType->meal_type_name = $request->input('meal_type_name');
      $mealType->save();

      return redirect()->route('admin.mealtypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $mealType = MealType::findOrFail($id);

      $mealType->delete();

      return redirect()->route('admin.mealtypes.index');
    }
}
