<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialContact extends Model
{
    protected $guarded = [];
    protected $table = "social_contacts";
    static  public function create($request)
    {
        $contact = new SocialContact();
        $contact->name = $request->name;
        $contact->url = $request->url;
        $contact->status = $request->status;
        $contact->about_id  = 1;
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('assets/img/contacts/', $name);
            $contact->image = '/assets/img/contacts/' . $name;
        }
        $contact->save();
    }
    static  public function edit($request,$id)
    {
        $contact = SocialContact::find($id);
        $contact->name = $request->name;
        $contact->url = $request->url;
        $contact->status = $request->status;
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('assets/img/contacts/', $name);
            $contact->image = '/assets/img/contacts/' . $name;
        }
        $contact->save();
    }
}
