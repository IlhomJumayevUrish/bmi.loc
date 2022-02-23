<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\District;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Region;
use App\SocialContact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login()
    {
        return view('users/login');
    }
    public function admin_login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('admin_id', $user->id);
                $request->session()->put('admin_fio', $user->fio);
                $request->session()->put('admin_type', $user->role->name);
                if ($user->photo) {
                    $request->session()->put('admin_photo', $user->photo);
                } else {
                    $request->session()->put('admin_photo', "/assets/img/gallery/gallery-3.jpg");
                }
                return redirect()->route('news-index');
            } else {
                return back()->with('response', 'Email or password is incorrect');
            }
        } else {
            return back()->with('response', 'Email or password is incorrect');
        }
    }
    public function logout()
    {
        if (Session::has('admin_id')) {
            Session::pull('admin_id');
            Session::pull('admin_fio');
            Session::pull('admin_photo');
            Session::pull('admin_type');
            
            return redirect('login');
        }
        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', 3)->get();
        return view('users/user-index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('users/user-add', [
            'countries' => $countries,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request);
        // dd($request->all());
        return redirect()->route('employee-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        return view('pages/ui-media-object',[
            'user'=>$user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $user = User::find($id);
        return view(
            'users/user-update',
            [
                'user' => $user,
                'countries' => $countries,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        User::updateUser($request, $id);
        return redirect()->route('employee-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('employee-index');
    }
    public function profileUpdate(ProfileUpdateRequest $request,$id){
        $user = User::find($id);
        if($request->password)
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('password_confirmation', 'Password is incorrect');
        }
        $user=User::updateProfile($request, $id);
        $request->session()->put('admin_fio', $user->fio);
        if($user->photo)
        $request->session()->put('admin_photo', $user->photo);
        return redirect()->route('profile');

    }
    public function profile(){  
        $countries = Country::all();
        $user=User::find(Session::get('admin_id'));
        return view('users/profile',[
                'user'=>$user,
                'countries'=>$countries,
            ]);
    }
}
