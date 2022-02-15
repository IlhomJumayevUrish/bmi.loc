<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Session;

class AuthValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user= User::find(Session::get('admin_id'));
        // dd($user->role->name);
        if($user){
            if ($user->role->name != "admin"  and   $user->role->name != "staff") {
                return redirect('login');
            }
            else{
                return $next($request);
            }
        }
        else
        {
            return redirect('login');
        }
    }
}
