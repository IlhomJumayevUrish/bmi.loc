<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        $partners=Partner::all();
        return view('frontend/index',[
            'partners'=>$partners
        ]);
    }
}
