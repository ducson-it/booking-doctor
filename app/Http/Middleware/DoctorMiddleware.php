<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorMiddleware
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
            if(Auth::user()->role_id == 2){
                return $next($request);
            }if(Auth::user()->role_id == 1)
                return redirect()->route('doctor.main')->with('msg', 'Oops, You are not Doctor');
            else {
                return redirect()->route('client')->with('msg', 'Oops, You are not Doctor');
            }
        }

        return redirect()->route('client')->with('msg', 'Please login !');
    }
}
