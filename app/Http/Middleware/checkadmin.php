<?php

namespace App\Http\Middleware;

use Closure;

class checkadmin
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
        if (session()->has('admin')) {
            if($uri=="admin/login")
            {
                return redirect()->route('dashBoard');
            }
            return $next($request);
        } else {
            if($uri=="admin/login")
            {
                return $next($request);
            }
            return redirect()->route('homePageAdmin');
        }
    }
}
