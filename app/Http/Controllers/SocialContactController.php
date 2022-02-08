<?php

namespace App\Http\Controllers;

use App\Contact;
use App\SocialContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialContactRequest;
use Illuminate\Http\Request;

class SocialContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=SocialContact::all();
        // return $contacts;
        return view('contacts/contact-index', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts/contact-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialContactRequest $request)
    {
        SocialContact::create($request);
        return redirect()->route('contact-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SocialContact  $socialContact
     * @return \Illuminate\Http\Response
     */
    public function show(SocialContact $socialContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SocialContact  $socialContact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact=SocialContact::find($id);
        return view('contacts/contact-edit',[
            'contact'=>$contact,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SocialContact  $socialContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        SocialContact::edit($request, $id);
        return redirect()->route('contact-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SocialContact  $socialContact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact=SocialContact::find($id);
        $contact->delete();
        return redirect()->route('contact-index');
    }
}
