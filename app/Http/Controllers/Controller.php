<?php

namespace App\Http\Controllers;

use App\About;
use App\News;
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
        $news=News::all();
        $about=About::first();
        return view('frontend/index',[
            'partners'=>$partners,
            'news'=>$news,
            'about'=>$about
        ]);
    }
}
