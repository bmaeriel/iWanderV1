<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Establishment;

class EstablishmentController extends Controller
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
      $establishments = Establishment::all();
      return view('admin.establishments.index')->with([
        'establishments' => $establishments
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.establishments.create');
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
        'establishment_name' => 'required|max:191'
      ]);

      $establishment = new Establishment();
      $establishment->establishment_name = $request->input('establishment_name');

      $establishment->save();

      return redirect()->route('admin.establishments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $establishment = Establishment::findOrFail($id);
      return view('admin.establishments.show')->with([
        'establishment' => $establishment
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
      $establishment = Establishment::findOrFail($id);
      return view('admin.establishments.edit')->with([
        'establishment' => $establishment
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
      $establishment = Establishment::findOrFail($id);

      $request->validate([
        'establishment_name' => 'required|max:191'
      ]);

      $establishment->establishment_name = $request->input('establishment_name');
      $establishment->save();

      return redirect()->route('admin.establishments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $establishment = Establishment::findOrFail($id);

      $establishment->delete();

      return redirect()->route('admin.establishments.index');
    }
}
