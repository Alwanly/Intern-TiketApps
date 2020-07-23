<?php

namespace App\Http\Controllers\APIControllers;

use App\Agent;
use App\BankMaster;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Price;
use App\Transaction;
use App\TransactionDetail;
use App\UmrohPacket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class TransactionController extends Controller
{

    public function index(Request $request){
        $packet = UmrohPacket::where('id',$request->packet_id)->with(['detail'=>function($q){
            $q->select(['id','packet_id','takeoff_date','manasik_date','return_date']);
        }])->select('id')->get();
        $price = Price::where('id',$request->price_id)->with(['room'=>function($q){
            $q->select(['id','room_name','room_price','room_capacity']);
        }])->select(['id','room_id','packet_id'])->get();
        $bank = BankMaster::all();
        $bank->makeHidden(['created_at','updated_at','status_id']);

        return response()->json([
            'packet'=>$packet,
            'price'=>$price,
            'banks'=>$bank
        ],200);
    }

    public function purchase(Request $request){
        $data = $request->all();
        $price = Price::find($data['price_id']);
        $transaction = Transaction::create([
            'user_id' =>Auth::id(),
            'packet_id'=>$price->packet->id,
            'price_id'=>$price->id,
            'status_id'=>4,
            'code_agent'=> $request->code_agent,
        ])->id;

        $date = Carbon::now()->toDateString();

        for ($i = 0 ; $i< count($data['name_jamaah']) ; $i++){
            $file = $data['ktp_jamaah'][$i];
            $nameJamaah = $data['name_jamaah'][$i];
            $namefile = str_replace(' ','_',$nameJamaah);
            $filename = $date.'_'.$namefile.'.'.$file->getClientOriginalExtension();

            $path = 'storage/ktpJamaah';

            $file->move($path,$filename);
            $namePhoto = asset($path.'/'.$filename);
            TransactionDetail::create([
                'transaction_id'=>$transaction,
                'jamaah_name'=>$data['name_jamaah'][$i],
                'jamaah_gender'=>$data['gender_jamaah'][$i],
                'jamaah_telephone'=>$data['number_jamaah'][$i],
                'jamaah_path_photoktp'=>$namePhoto
            ]);
        }

        $payment = Payment::create([
            'bank_id'=> $data['bank'],
            'transaction_id'=>$transaction,
            'nominal' => $price->room->room_price,
            'status_id' => 10
        ])->id;
        return response()->json([
            'status'=>true,
            'message'=>'Berhasil',
            'content'=> ['payment_id'=>$payment]
        ],200);
    }


    public function checkCodeAgent(Request $request){
        $codeA = Agent::where('code_agent',$request->code)->get();
        $status = (isset($codeA[0]->id)) ? true : false;
        if ($status) {
            $message = "Code Agent Available";
        } else{
            $message = "Code Agent inValid";
        }

        return response()->json([
            'status'=>$status
            ,'message'=>$message
        ],200);
    }

    public function showList(Request $request)
    {
        $trs = null  ;
        $token = JWTAuth::parseToken()->authenticate();
        $user_id = $token->id;
        $request = $request->id;
        $trs = Transaction::with(['packet'=>function($q){
               $q->select(['id','path_bannerpacket','packet_title']);
        },'packet.detail'=>function($q){
            $q->select('packet_id','takeoff_date');
        },'price'=>function($q){
            $q->select(['id','room_id']);
        },'price.room'=>function($q){
            $q->select(['id','room_name','room_price']);
        },'payment'=>function($q){
            $q->select(['id','transaction_id']);
        }])
            ->with(['status'=>function($q){
                $q->select(['id','status_name']);
            }])
            ->where('user_id',$user_id)
            ->where('status_id',$request)
            ->get();
        $trs->makeHidden(['packet_id','status_id','updated_at']);
        return response()->json([
            "trs"=>$trs
        ],200);
    }
}
