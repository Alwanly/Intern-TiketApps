<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use App\PaymentConfirm;
use App\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $payments = Payment::paginate(10);
        return view('admin.payment.paymentList',['payments'=>$payments]);
    }

    public function detail($id){
        $payment = Payment::find($id);
        return view('admin.payment.paymentDetail'
        ,['payment'=> $payment]);
    }

    public function update(Request $request){
        $status = $request->submit == "Accept"? 12 :13;
        PaymentConfirm::find($request->id)->update([
            'status_id'=>$status,
        ]);
        $payment =  PaymentConfirm::find($request->id);

        $paymentId = $payment->payment->transaction->id;

        if ($status == 12 ){
            Transaction::find($paymentId)->update([
                'status_id' => 5
            ]);
        }
        $request->session()->flash('status',true);
        $request->session()->flash('message','Successfully Update  Data');

        return redirect()->back();
    }
}
