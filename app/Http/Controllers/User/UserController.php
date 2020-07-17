<?php

namespace App\Http\Controllers\User;



use Carbon\Carbon;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        $id = Auth::id();
       $user = App\User::find($id);
        $banks = App\BankMaster::where('status_id',2)->get();
       return view('user.accountProfile',[
           'user'=>$user,
           'banks'=>$banks
       ]);
    }

    public function agent(Request $request){

        $dateDaftar = Carbon::now()->toDateString();
        $code = $this->getCodeAgent();
        $file = $request->file('photo');
        $filname = $dateDaftar.'_'.$request->norekening.'.'.$file->getClientOriginalExtension();
        $path = 'storage/agentKTP';
        $file->move($path,$filname);

        $agent = App\Agent::create([
            'user_id'=>Auth::user()->id,
            'agent_type_id'=> 1,
            'code_agent' => $code,
            'bank_id' => $request->bank_id,
            'norekening' => $request->norekening,
            'name_rekening' => $request->name_rekening,
            'path_photoktp'=> $filname,
            'status_id' => 3
        ])->get();

        $status = ($agent != ' ') ? 'true' : 'false';

        return response()->json([
            'status' => $status,
            'code'=> $request->all(),
        ]);
    }

    public function getCodeAgent()
    {
        do {

        $code = Str::random(5);
        $status = App\Agent::where('code_agent', $code)->get();
        }while($status == '');

        return $code;
    }

    public function update(Request $request){
        $id = Auth::id();

        $status = App\User::find($id)->update(['name'=>$request->name,'telephone'=>$request->phone]);
        if ($status) {

            if ($request->hasFile('file')){
                $file = $request->file('file');
                $filname = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
                $path = 'storage/profile';
                $file->move($path, $filname);
                $userdetail = App\UserDetail::where('user_id', $id)->update([
                    'path_photoprofile' => $filname
                ]);
            }
            $userdetail = App\UserDetail::where('user_id', $id)->update([
                'gender' => $request->gender,
                'address' => $request->address
            ]);

        }
        return response()->json(['status'=>$status]);
    }
}
