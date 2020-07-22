<?php

namespace App\Http\Controllers\APIControllers;

use App\BankMaster;
use App\Http\Controllers\Controller;
use App\Payment;
use App\PaymentConfirm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($id){
        $payment = Payment::where('id',$id)
            ->with(['bank'=>function($q){
            $q->select(['id','bank_code','bank_name']);
        }])
            ->with(['status'=>function($q){
                $q->select(['id','status_name']);
            }])->get();
        $payment->makeHidden(['created_at','updated_at','bank_id','status_id']);
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
//
        $file = $request->file('photo');
        $filname = $dateConfirm.'_'.$time.'_'.$request->norekening.'.'.$file->getClientOriginalExtension();
        $path = 'storage/photoTransfer';

        $file->move($path,$filname);
        $paymentC = PaymentConfirm::create([
            'payment_id' => $request->payment_id,
            'bank_id' => $request->bank_id,
            'norekening' => $request->norekening,
            'rekening_name'=> $request->rekening_name,
            'path_photoproof' => $filname,
        ]);

        $payment = Payment::find($paymentC->payment_id)->update(['status_id'=>11]);

        return response()->json([
            'status'=>$payment,
            'message'=>'Payment Confirm Success',
            'Content'=>[
                'PaymentConfirm_id'=>$paymentC->id
            ]
        ],200);
    }
}
