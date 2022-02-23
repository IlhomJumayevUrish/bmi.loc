<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Country::all();
        return response()->json([
            'countries'=>$countries,
        ]);
    }
    public function all()
    {
        $countries=Country::all();
        return view('countries/index',[
            'countries'=>$countries,
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
    public function store(StoreCountryRequest $request)
    {
        $country=new Country();
        $country->name=$request->name;
        $country->key=$request->key;
        $country->save();
        return redirect()->route('country-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country=Country::find($id);
        return response()->json([
            'country'=>$country->regions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCountryRequest $request, $id)
    {
        $country = Country::find($id);
        $country->name = $request->name;
        $country->key = $request->key;
        $country->save();
        return redirect()->route('country-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
