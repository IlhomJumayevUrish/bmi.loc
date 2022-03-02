<?php

namespace App\Http\Controllers;

use App\About;
use App\Http\Controllers\Controller;
use App\PublicMethod;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function page(){
        $about=About::first();
       
        return view('frontend/about',[
            'about'=>$about
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=About::all()->first();
        return view('about/index',[
            'about'=>$about,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $about=About::first();
        return view('about/update',[
            'about'=>$about,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $about=About::first();
        $about->title=$request->title;
        $about->address=$request->address;
        $about->email=$request->email;
        $about->phone=$request->phone;
        $about->working_date=$request->working_date;
        $about->description=$request->description;
        if ($file = $request->file('image')) {
            $about->image = PublicMethod::uploadImage($file,'abouts',$about->image);
        }
        if ($file = $request->file('logo')) {
            $about->logo = PublicMethod::uploadImage($file, 'abouts', $about->image);
        }
        $about->save();
        return redirect()->route('about-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
