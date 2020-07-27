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
        if ($user->role->role =='Admin'){
            redirect(route('dashboard'));
        } elseif ($user->role->role =='jamaaah'){
            redirect(route('home'));
        }else {
            return route('login');
        }

        return $next($request);
    }
}
