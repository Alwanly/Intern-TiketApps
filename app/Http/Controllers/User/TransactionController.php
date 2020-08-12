<?php

namespace App\Http\Controllers\User;

use App\Agent;
use App\BankMaster;
use App\Http\Controllers\Controller;
use App\Payment;
use App\PaymentConfirm;
use App\Price;
use App\Transaction;
use App\TransactionDetail;
use Carbon\Carbon;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Factory;

use App\Http\Controllers\User\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;
use Psy\Exception\ThrowUpException;

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
        Validator::make($request->all(),[
            'name_jamaah.*' => 'required|string|min:3',
            'gender_jamaah.*'=>'required|in:Pria,Wanita',
            'number_jamaah.*'=> 'numeric|min:11',
            'ktp_jamaah.*'=> 'required|image|mimes:jpeg,bmp,png',
            'bank' => 'required',
        ],[
            'required'=>'The :attribute field is required',
            'min'=>'The :attribute must be at least :min Characters ',
            'max' => 'Phone Number Maximal :max',
            'numeric' => 'Phone filed must be Number',
            'in' => 'Pria wanita'
        ])->validate();

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
            $namePhoto = asset('storage/ktpJamaah/'.$filename);
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

        return redirect()->route('paymentIndex',['id'=>$payment]);
    }

    public function showList($request){
        $user_id = Auth::user()->id;
        if ($request == 0){
            $trs = Transaction::where('user_id',$user_id)->orderBy('created_at','desc')->get();
            $tabs = $request;
        }
        if ($request == 1){
            $trs = Transaction::where('status_id',4)->where('user_id',$user_id)->orderBy('created_at','desc')->get();
            $tabs = $request;
        }
        if ($request == 2){
            $trs = Transaction::where('status_id',5)->where('user_id',$user_id)->orderBy('created_at','desc')->get();
            $tabs = $request;
        }
        if ($request == 3){
            $trs = Transaction::where('status_id',6)->where('user_id',$user_id)->orderBy('created_at','desc')->get();
            $tabs = $request;
        }
        if ($request == 4){
            $trs = Transaction::where('status_id',7)->where('user_id',$user_id)->orderBy('created_at','desc')->get();
            $tabs = $request;
        }
        if ($request == 5){
            $trs = Transaction::where('status_id',8)->where('user_id',$user_id)->orderBy('created_at','desc')->get();
            $tabs = $request;
        }
        if ($request == 6){
            $trs = Transaction::where('status_id',9)->where('user_id',$user_id)->orderBy('created_at','desc')->get();
            $tabs = $request;
        }

        return view('user.purchaseList',[
            'trs' => $trs,
            'tabs' => $tabs
        ]);
    }

    public function checkCodeAgent(Request $request){
        $codeA = Agent::where('code_agent',$request->code)->get();
        $status = (isset($codeA[0]->id)) ? true : false;
        if ($status) {
            $message = "Code Agent Available";
        } else{
            $message = "Code Agent inValid";
        }

        return response()->json(['status'=>$status,'message'=>$message]);
    }
}
