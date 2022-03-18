<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $contacts = Comment::all();
    //     return view('contact_user/index', [
    //         'contacts' => $contacts,
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required',
            'description' => 'required',
            'news_id' => 'required',
        ]);
        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'news_id' => $request->news_id
        ]);
        return Redirect::back()->with('status', 'Ваше сообщение было успешно отправлено');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Contact  $contact
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Comment $contact)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Contact  $contact
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $contact = Contact::find($id);
    //     return view('contact_user/update', [
    //         'contact' => $contact,
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Contact  $contact
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateContactRequest $request, $id)
    // {
    //     Contact::updateContact($request, $id);
    //     return redirect()->route('contact-user-index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Contact  $contact
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $contact = Contact::find($id);
    //     $contact->delete();
    //     return redirect()->route('contact-user-index');
    // }
}
