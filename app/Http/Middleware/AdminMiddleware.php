<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->role_id == 1){
                return $next($request);
            }if(Auth::user()->role_id == 2)
                return redirect()->route('admin.dashboard')->with('msg', 'Oops, You are not Admin');
            else {
                return redirect()->route('client')->with('msg', 'Oops, You are not Admin');
            }
        }

        return redirect()->route('client')->with('msg', 'Please login!');
    }
}
