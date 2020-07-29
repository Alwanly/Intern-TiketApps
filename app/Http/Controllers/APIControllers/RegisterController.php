<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use App\OTPUser;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use JWTAuth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function register(Request $request){
        $user = $this->create($request->all());
        if(!empty($user)){
            $token = JWTAuth::fromUser($user);
            return response()->json(['status'=>true,'message'=>'Register Success','content'=>['user_id'=>$user->otp->user_id,'otp'=>$user->otp->code_otp],"token"=>$token]);
        }else{
            return response()->json(['status'=>false,'message'=>'Data sudah ada atau Belum sesuai']);
        }
    }

    protected function create(array $data)
    {
        $otp = random_int(000001,999999);
        try {
            $User = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'telephone' =>$data['phone'],
                'role_id'=>1,
                'status_id'=>2,
            ]);
        } catch (\Throwable $th) {
            $User = null ;
        }                   
    
        if(!empty($User)){
            UserDetail::create([
                'user_id' => $User->id
            ]);
            OTPUser::create([
            'user_id' =>$User->id,
                'code_otp' => $otp,
                'status_id'=>3
            ]);
        }

        return $User;
    }
}
