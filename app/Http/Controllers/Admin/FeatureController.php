<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Feature;

class FeatureController extends Controller
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
      $features = Feature::all();
      return view('admin.features.index')->with([
        'features' => $features
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.features.create');
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
        'feature_name' => 'required|max:191'
      ]);

      $feature = new Feature();
      $feature->feature_name = $request->input('feature_name');

      $feature->save();

      return redirect()->route('admin.features.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $feature = Feature::findOrFail($id);
      return view('admin.features.show')->with([
        'feature' => $feature
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
      $feature = Feature::findOrFail($id);
      return view('admin.features.edit')->with([
        'feature' => $feature
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
      $feature = Feature::findOrFail($id);

      $request->validate([
        'feature_name' => 'required|max:191'
      ]);

      $feature->feature_name = $request->input('feature_name');
      $feature->save();

      return redirect()->route('admin.features.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $feature = Feature::findOrFail($id);
      $feature->delete();
      return redirect()->route('admin.features.index');
    }
}
