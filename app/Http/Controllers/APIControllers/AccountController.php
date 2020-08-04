<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Agent;
use App\UserDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use JWTAuth;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\FormSizeFileException;

class AccountController extends Controller
{

    public function account(){
        $token = JWTAuth::parseToken()->authenticate();
        $user = User::where('id',$token->id)
            ->with(['userDetail'=>function($q){
            $q->select(['id','user_id','gender','path_photoprofile','address']);
        },'agent'=>function($q){
            $q->select(['id','user_id','code_agent',"agent_type_id",'status_id']);
        },'agent.type' =>function($q){
            $q->select(['id','title']);
        },'agent.status' =>function($q){
            $q->select(['id','status_name']);
        }])
            ->first();
        $user->makeHidden(['created_at','updated_at','role_id','status_id']);
        return response()->json($user);
    }

    public function update(Request $request){
        $token = JWTAuth::parseToken()->authenticate();
        $user = User::find($token->id);
        $detail = UserDetail::where('user_id',$user->id);

        $user->name = $request->name;
        $user->telephone = $request->telephone;
        $detail->update(['gender'=>$request->gender]);
        $detail->update(['address'=>$request->address]);      
       
        $file = $request->profile;
        $name = str_replace(' ','_',$user->name);
        $filename = time() . '_' . $name   ;
        $path = 'storage/profile/'.$filename.'.jpeg';
        $url = asset('/'.$path);

        file_put_contents($path,base64_decode($file));
        $detail->update([
            'path_photoprofile' => $url
        ]); 
                   
        $user->save();
        $status  = (!empty($user) && $detail)? true : false;

        return response()->json(['status'=>$status,'message'=>"berhasil"],200);
    }
    public function getImageProfile(Request $image){
        return response()->json(['image'=>asset('storage/profile/'.$image->image)]);
    }

    public function agent(Request $request){

        $dateDaftar = Carbon::now()->toDateString();
        $code = $this->getCodeAgent();
        $file = $request->ktp;
        $filename = $dateDaftar.'_'.$request->norekening.'.jpeg';
        $path = 'storage/agentKTP/'.$filename;
        $url = asset('/'.$path);
        file_put_contents($path,base64_decode($file));
        $token = JWTAuth::parseToken()->authenticate();
        $check = Agent::where('user_id',$token->id)->get();

        if (empty($check[0])) {
            $agent = Agent::create([
                'user_id' => Auth::user()->id,
                'agent_type_id' => 3,
                'code_agent' => $code,
                'bank_id' => $request->bank_id,
                'norekening' => $request->norekening,
                'name_rekening' => $request->name_rekening,
                'path_photoktp' => $url,
                'status_id' => 17
            ])->orderByDesc('id')->first();
            $message = "Berhasil Daftar Agent";
        }else{
            $agent = Agent::where('user_id',$token->id)->first();
               $agent->update([
                    'bank_id' => $request->bank_id,
                    'norekening' => $request->norekening,
                    'name_rekening' => $request->name_rekening,
                    'path_photoktp' => $url,
                    'status_id' => 17
                ]);

            $message = "Berhasil Update Daftar Agent";
        }

        $status = (!empty($agent)) ? true : false;

        return response()->json([
            'status' => $status,
            'message'=> $message,
            'content' => ['agent_id'=>$agent->id]
        ],200);
    }

    public function getCodeAgent()
    {
        do {
            $code = Str::random(5);
            $status = Agent::where('code_agent', $code)->get();
        }while($status == '');

        return $code;
    }
}
