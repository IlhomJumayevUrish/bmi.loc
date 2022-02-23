<?php

namespace App\Http\Controllers;

use App\Country;
use App\District;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDistrictRequest;
use App\News;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coutries=Country::all();
        $districts = District::all();
        return view('districts/index',[
            'districts'=>$districts,
            'countries'=>$coutries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistrictRequest $request)
    {
        $district=new District();
        $district->name=$request->name;
        $district->region_id=$request->region;
        $district->key=$request->key;
        $district->save();
        return redirect()->route('district-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDistrictRequest $request, $id)
    {
        $district = District::find($id);
        $district->name = $request->name;
        $district->region_id = $request->region;
        $district->key = $request->key;
        $district->save();
        return redirect()->route('district-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::find($id);
        $district->delete();
        return redirect()->route('district-index');
    }
}
