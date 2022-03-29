<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];
    protected $table = "contacts";
    static public function create($request)
    {
        $contact=new Contact();
        $contact->fio=$request->fio;
        $contact->email=$request->email;
        $contact->phone1=$request->phone1;
        $contact->description=$request->description;
        $contact->save();
    }
    static public function updateContact($request,$id)
    {
        $contact=Contact::find($id);
        $contact->fio=$request->fio;
        $contact->email=$request->email;
        $contact->phone1=$request->phone1;
        $contact->description=$request->description;
        $contact->save();
    }
}
