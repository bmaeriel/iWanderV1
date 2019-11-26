<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Detail;

class DetailController extends Controller
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
      $details = Detail::all();
      return view('admin.details.index')->with([
        'details' => $details
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.details.create');
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
        'description' => 'required|max:255',
        'website' => 'required|max:50',
        'email' => 'required|max:191|email',
        'phone' => 'required|max:13',
        'min_price' => 'numeric',
        'max_price' => 'numeric'
        // 'main_image' =>'max:10'
      ]);

      $detail = new Detail();
      $detail->description = $request->input('description');
      $detail->website = $request->input('website');
      $detail->email = $request->input('email');
      $detail->phone = $request->input('phone');
      $detail->min_price = $request->input('min_price');
      $detail->max_price = $request->input('max_price');
      $detail->save();

      return redirect()->route('admin.details.index');
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
      return view('admin.details.show')->with([
        'detail' => $detail
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
      $detail = Detail::findOrFail($id);
      return view('admin.details.edit')->with([
        'detail' => $detail
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
      $detail = Detail::findOrFail($id);

      $request->validate([
        'description' => 'required|max:255',
        'website' => 'required|max:50',
        'email' => 'required|max:191|email',
        'phone' => 'required|max:13',
        'min_price' => 'numeric',
        'max_price' => 'numeric'
      ]);

      $detail->description = $request->input('description');
      $detail->website = $request->input('website');
      $detail->email = $request->input('email');
      $detail->phone = $request->input('phone');
      $detail->min_price = $request->input('min_price');
      $detail->max_price = $request->input('max_price');
      $detail->save();

      return redirect()->route('admin.details.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $detail = Detail::findOrFail($id);
      $detail->delete();
      return redirect()->route('admin.details.index');
    }
}
