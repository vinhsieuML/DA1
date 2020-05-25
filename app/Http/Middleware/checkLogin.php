<?php

namespace App\Http\Middleware;

use Closure;

class checkLogin
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
        $uri=$request->route()->uri;
        if (session()->has('token')) {
            if($uri=="login")
            {
                return redirect()->route('userHome');
            }
            return $next($request);
        } else {
            if($uri=="login")
            {
                return $next($request);
            }
            return redirect()->route('homePage');
        }
    }
}
