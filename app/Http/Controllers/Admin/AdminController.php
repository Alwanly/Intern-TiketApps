<?php

namespace App\Http\Controllers\Admin;


use App\Payment;
use App\Transaction;
use App\UmrohPacket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use PHPUnit\Framework\Constraint\Count;

class AdminController extends Controller
{

    public function index (){

        $date  = Carbon::now()->toDateString();
        $packet = UmrohPacket::where('status_id',2)->get();
        $packet = count($packet);

        $tr = Transaction::all();
        $troder = count(Transaction::whereDate('created_at',$date)->get());
        $tr = count($tr);

        $py_total = count(Payment::all());
        $py = 0;
        if ($py_total != 0 ) {
            $py_success = count(Payment::where('status_id', 12)->get());
            $py = round(($py_success / $py_total) * 100);
        }

        return view('admin.dashboard',[
            'packet'=>$packet,
            'tr'=>$tr,
            'py' => $py,
            'trOder'=>$troder,
        ]);
    }

    public function report(Request $request){
        $tranasction = null;
        if ($request->has('start_date') ){
        $tranasction = Transaction::whereBetween('created_at',[$request->start_date,$request->end_date])
            ->get();
        }

        return view('admin.report',['transaction'=>$tranasction]);
    }
}
