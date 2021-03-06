<?php

namespace App\Http\Middleware;

use App\About;
use App\Product;
use App\SocialContact;
use Closure;

class Variable
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
        $about=About::first();
        view()->share('about', $about);
        $contacts= SocialContact::where('status','active')->get();
        view()->share('contacts', $contacts);
        $products= Product::where('type','product')->get();
        view()->share('products', $products);
        return $next($request);
    }
}
