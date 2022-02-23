<?php

namespace App\Http\Controllers;

use App\Country;
use App\Region;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegionyRequest;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'regions'=> Region::all(),
        ]);
    }
    public function all()
    {
        $regions= Region::all();
        $countries=Country::all();
        return view('regions/index',[
            'regions'=>$regions,
            'countries'=>$countries
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
    public function store(StoreRegionyRequest $request)
    {
       $region=new Region();
       $region->name=$request->name;
       $region->key=$request->key;
       $region->country_id=$request->country;
       $region->save();
       return redirect()->route('region-index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'region'=> Region::find($id)->districts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRegionyRequest $request, $id)
    {
        $region = Region::find($id);
        $region->name = $request->name;
        $region->key = $request->key;
        $region->country_id = $request->country;
        $region->save();
        return redirect()->route('region-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region=Region::find($id);
        $region->delete();
        return redirect()->route('region-index');
    }
}
