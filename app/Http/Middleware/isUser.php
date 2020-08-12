<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isUser
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
        $user = Auth::user();
//        if ($user->role->role =='Admin'){
//            return redirect()->route('dashboard');
//        } elseif ($user->role->role =='jamaaah'){
//            return redirect()->route('home');
//        }else {
//            return redirect()->route('login');
//        }
        if ($user->role->role != 'jamaah') {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
