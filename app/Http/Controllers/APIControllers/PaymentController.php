<?php

namespace App\Http\Controllers\APIControllers;

use App\BankMaster;
use App\Http\Controllers\Controller;
use App\Payment;
use App\PaymentConfirm;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($id){
        $payment = Payment::where('id',$id)
            ->with(['bank'=>function($q){
            $q->select(['id','bank_code','bank_name']);
        },'bank.rekening'=>function($q){
            $q->select(['id','bank_id','norekening','rekening_name'])->first();
        }])
            ->with(['status'=>function($q){
                $q->select(['id','status_name']);
            }])->first();
        $payment->makeHidden(['updated_at','bank_id','status_id']);
        return response()->json(
            [
                "status"=>true,
                "message"=>"Payment Confirm",
                "content"=>[
                'payment'=>$payment,
            ]],200);
    }
    public function bank(){
        $banks = BankMaster::where('status_id','2')->get();
        return response()->json(
            [
                "status"=>true,
                "message"=>"Master Bank",
                "content"=>[
                    'banks'=> $banks
                ]],200);
    }

    public function paymentConfirm(Request $request){
        $dateConfirm = Carbon::now()->toDateString();
        $time =  time();

        $filname = $dateConfirm.'_'.$time.'_'.$request->norekening.'.jpeg';
        $path = 'storage/photoTransfer/'.$filname;

        $url = asset('/'.$path);
        file_put_contents($path,base64_decode($request->photo_transfer));
        $paymentC = PaymentConfirm::create([
            'payment_id' => $request->payment_id,
            'bank_id' => $request->bank_id,
            'norekening' => $request->norekening,
            'rekening_name'=> $request->rekening_name,
            'path_photoproof' => $url
        ]);

        $payment = Payment::find($paymentC->payment_id);
        $trId = $payment->transaction_id;
        $payment->update(['status_id'=>11]);        
        return response()->json([
            'status'=>true,
            'message'=>'Payment Confirm Success',
            'Content'=>[
                'PaymentConfirm_id'=>$paymentC->id
            ]
        ],200);
    }
    public function paymentExpired(Request $request){
        $status = Payment::find($request->payment_id);
        Transaction::find($status->transaction_id)->update(['status_id'=>15]);
        $status->status_id = 15;
        $status->save();
        $status = (!empty($status)) ? true : false;
        $message = ($status) ? "Pembayaran Expired" : "Error check Payment ";

        return response()->json([
            'status'=>$status,
            'message'=>$message
        ],200);
    }
}
