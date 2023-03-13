<?php

namespace App\Http\Middleware;

use App\Models\MSME;
use Closure;
use Illuminate\Http\Request;

class CheckMSME
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
        if(!session()->has('user')){
            return redirect('login');
        }
        
        $user = session()->get('user');
        $msme = MSME::where('userID', $user->userID)->first();
        if($msme === null) {
            return redirect('home');
        }
        return $next($request);
    }
}
