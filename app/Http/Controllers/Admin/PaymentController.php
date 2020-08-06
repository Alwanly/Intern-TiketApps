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
        $payments = Payment::orderBy('created_at','desc')->get();
        return view('admin.payment.paymentList',['payments'=>$payments]);
    }

    public function detail($id){
        $payment = Payment::find($id);

        $paymentConfirm = PaymentConfirm::where('payment_id',$payment->id)->latest()->first();
        return view('admin.payment.paymentDetail',[
            'payment'=> $payment,
            'paymentConfirm' => $paymentConfirm
        ]);
    }

    public function update(Request $request){
        $status = $request->submit == "Accept"? 12 :13;
       Payment::find($request->id)->update([
            'status_id'=>$status,
        ]);
        $py = Payment::find($request->id);
        $id = $py->transaction_id;
        if ($status == 12 ){
            Transaction::find($id)->update([
                'status_id' => 5
            ]);
        }
        if ($status == 13 ){
            Transaction::find($id)->update([
                'status_id' => 13
            ]);
        }
        $request->session()->flash('status',true);
        $request->session()->flash('message','Successfully Update  Data');

        return redirect()->back();
    }
}
