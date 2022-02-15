<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\PublicMethod;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners=Partner::all();
        return view('partners/index',[
            'partners'=>$partners,
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
    public function store(Request $request)
    {
        $partner=new Partner();
        $partner->title=$request->title;
        $partner->url=$request->url;
        if ($file = $request->file('image')) {
         
            $partner->image = PublicMethod::uploadImage($file, 'partners');
        }
        $partner->save();
        return redirect()->route('partner-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartnerRequest $request,$id)
    {
        $partner = Partner::find($id);
        $partner->title = $request->title;
        $partner->url = $request->url;
        if ($file = $request->file('image')) {

            $partner->image = PublicMethod::uploadImage($file, 'partners',$partner->image);
        }
        $partner->save();
        return redirect()->route('partner-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner=Partner::find($id);
        $partner->delete();
        return redirect()->route('partner-index');
    }
}
