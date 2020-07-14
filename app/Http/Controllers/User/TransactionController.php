<?php

namespace App\Http\Controllers\User;

use App\BankMaster;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Price;
use App\Transaction;
use App\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\User\PaymentController;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request){
        $price = Price::find($request->price_id);
        $banks = BankMaster::where('status_id',2)->get();
        return view('user.transaction',[
            'price'=>$price,
            'banks'=>$banks
        ]);
    }

    public function store(Request $request){
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
            $filename = $date.'_'.$data['name_jamaah'][$i].'.'.$file->getClientOriginalExtension();
            $path = 'storage/ktpJamaah';

            $file->move($path,$filename);

            TransactionDetail::create([
                'transaction_id'=>$transaction,
                'jamaah_name'=>$data['name_jamaah'][$i],
                'jamaah_gender'=>$data['gender_jamaah'][$i],
                'jamaah_telephone'=>$data['number_jamaah'][$i],
                'jamaah_path_photoktp'=>$filename
            ]);
        }

        $payment = Payment::create([
            'bank_id'=> $data['bank_id'],
            'transaction_id'=>$transaction,
            'nominal' => $price->room->room_price
        ]);
        return redirect()->route('paymentIndex',['id'=>$payment->id]);
    }
}
