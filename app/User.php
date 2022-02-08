<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

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
        if ($file = $request->file('photo')) {
            $name = $file->getClientOriginalName();
            $file->move('assets/img/photos/', $name);
            $user->photo = '/assets/img/photos/' . $name;
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
        if ($file = $request->file('photo')) {
            $name = $file->getClientOriginalName();
            $file->move('assets/img/photos/', $name);
            $user->photo = '/assets/img/photos/' . $name;
        }
        $user->save();
    }
}
