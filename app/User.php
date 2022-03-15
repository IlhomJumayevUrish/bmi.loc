<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Image;

class User extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];
    protected $table = "users";
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    
    static  public function create($request)
    {
        $user = new User();
        $user->fio=$request->fio;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->country_id=$request->country;
        $user->region_id=$request->region;
        $user->district_id=$request->district;
        $user->status=$request->status;
        $user->role_id=3;
        $user->reason_for_backing="";
        $user->password = Hash::make($request->password);
        if($request->file('photo'))
        {
            $user->photo=PublicMethod::uploadFile($request->file('photo'),'users');
        }
        $user->save();



    }
    static  public function updateUser($request,$id)
    {
        $user = User::find($id);
        $user->fio=$request->fio;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->country_id=$request->country;
        $user->region_id=$request->region;
        $user->district_id=$request->district;
        $user->status=$request->status;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if($request->file('photo'))
        $user->photo = PublicMethod::uploadImage($request->file('photo'), 'users',$user->photo);
        $user->save();
    }
    static  public function updateProfile($request,$id)
    {
        $user = User::find($id);
        $user->fio=$request->fio;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->country_id=$request->country;
        $user->region_id=$request->region;
        $user->district_id=$request->district;
        $user->address=$request->address;
        $user->series=$request->series;
        $user->number=$request->number;
        $user->birthday = Carbon::parse($request->birthday)->format('Y-m-d H:i:s');
        $user->issued_by=$request->issued_by;
        $user->when_issued=Carbon::parse($request->when_issued)->format('Y-m-d H:i:s');
        if ($request->password_confirmation) {
            $user->password = Hash::make($request->password_confirmation);
        }
        if($request->file('photo'))
        $user->photo = PublicMethod::uploadImage($request->file('photo'), 'users',$user->photo);
        if($request->file('password_image'))
        $user->password_image = PublicMethod::uploadImage($request->file('password_image'), 'users',$user->photo);
        $user->save();
        return $user;
    }
}
