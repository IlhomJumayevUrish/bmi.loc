<?php

namespace App\Http\Middleware;

use App\About;
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
        return $next($request);
    }
}
