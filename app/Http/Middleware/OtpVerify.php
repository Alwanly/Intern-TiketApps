<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class OtpVerify
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
        $user = JWTAuth::user();

        if ($user->otp->status_id == 3) {
            return response()->json([
                'status'=>false,
                'message'=>'Account not Verify'
            ]);
        }
        return $next($request);
    }
}
