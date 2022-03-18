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
        $contact->image=PublicMethod::uploadImageSmall($request->file('image'), 'contacts');
        $contact->save();
    }
    static  public function edit($request,$id)
    {
        $contact = SocialContact::find($id);
        $contact->name = $request->name;
        $contact->url = $request->url;
        $contact->status = $request->status;
        if($request->file('image')){
            $contact->image=PublicMethod::uploadImageSmall($request->file('image'), 'contacts', $contact->image);
        }
        $contact->save();
    }
}
