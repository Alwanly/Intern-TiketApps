<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use App\OTPUser;
use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class LoginController extends Controller
{
    public function login(Request $request){
        $credentials =$request->only($this->username(),'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)){
                return response()->json(['status'=>false,'message'=>'Email or Phone wrong'],400);
            }
        }catch (JWTException $e){
            return response()->json(['status'=>false,'message'=>'Error generate Token'],500);
        }
        $user = User::find(JWTAuth::user()->id);
        return response()->json(['status'=>true,'message'=>'Login Success','content'=>['user'=>$user->getJSONUser(),'token'=>$token]]);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }

    private function username()
    {
        $login = request()->input('username');

        if(is_numeric($login)){
            $field = 'telephone';
        } else {
            filter_var($login, FILTER_VALIDATE_EMAIL);
            $field = 'email';
        }


        request()->merge([$field => $login]);

        return $field;
    }

    public function otp(Request $request){
        $otp = OTPUser::where('user_id',$request->user_id)->get();

        if ($otp[0]->code_otp != $request->code_otp){
            return response()->json(['status'=>false,'message'=>'Code OTP Invalid']);
        }

        $otp[0]->status_id = 2;
        $otp[0]->save();
        return response()->json(['status'=>$otp,'message'=>'Code OTP berhasil']);
//        return response()->json($otp->code_otp);
    }

    public function logout(Request $request){


        try {
            auth('api')->logout();

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }


}
