<?php

namespace App\Http\Controllers\User;

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
    $payment = Payment::find($id);
    $banks = BankMaster::where('status_id','2')->get();
        return view('user.paymentConfirm',
            [
                'payment'=>$payment,
                'banks'=> $banks
            ]);
    }

    public function confirm(Request $request){
        $dateConfirm = Carbon::now()->toDateString();
        $time =  time();
//
        $file = $request->file('photo');
        $filename = $dateConfirm.'_'.$time.'_'.$request->norekening.'.'.$file->getClientOriginalExtension();
        $path = 'storage/photoTransfer';

        $file->move($path,$filename);
        $namePhoto = asset('storage/photoTransfer/'.$filename);
        $paymentC = PaymentConfirm::create([
            'payment_id' => $request->payment_id,
            'bank_id' => $request->bank_id,
            'norekening' => $request->norekening,
            'rekening_name'=> $request->rekening_name,
            'path_photoproof' => $namePhoto,
        ]);

        $payment = Payment::find($paymentC->payment_id)->update(['status_id'=>11]);

        $request->session()->flash('status',true);
        $request->session()->flash('message','Payment Confirm Success');
        return response()->json(['status',$payment]);
    }

    public function expired($id, Request $request){
        $status = Payment::find($id);
        Transaction::find($status->transaction_id)->update(['status_id'=>15]);
        $status->update([
            'status_id'=> 15
        ]);

        return response()->json([
            'status'=>$status,
            'message'=>'Pembayaran Expired']);
    }
}
