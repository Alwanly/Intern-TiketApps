<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\StatusMaster;
use App\Transaction;
use App\UmrohPacket;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::all();
        return view('admin.transaction.transactionList',['transactions'=>$transactions]);
    }
    public function detail($id){
        $transaction = Transaction::find($id);
        return view('admin.transaction.transactionDetail',['transaction'=>$transaction]);
    }
    public function edit(){
        $packets = UmrohPacket::all();
        $status = StatusMaster::where('status_code','st')->get();

        return view('admin.transaction.transactionUpdate',[
            'packets' => $packets,
            'status' => $status
        ]);
    }
    public function update(Request $request){
        $status = Transaction::where('packet_id',$request->packet)->whereNotIn('status_id',['4','15'])->update([
            'status_id'=>$request->status
        ]);

        $packet = UmrohPacket::find($request->packet);

        if ($request->status == 8){
            Transaction::where('packet_id',$request->packet)->where('status_id','<',8)->update([
                'status_id'=>15
            ]);
        }
        if ($request->status == 9){
            $packet->status_id = 3;
            $packet->save();
        }

        if (!$status) {
            $request->session()->flash('status', false);
            $request->session()->flash('message', 'Error Updates Data');
            return redirect()->route('masterData');
        }
        $request->session()->flash('status', true);
        $request->session()->flash('message', 'Successfully Updates Packet ');

        return redirect()->back();
    }

    public function getPacket($id){
        $packet = UmrohPacket::find($id);

        return response()->json(['status'=>true,
            'manasik'=>$packet->detail->manasik_date,
            'takeoff'=>$packet->detail->takeoff_date,
            'return'=>$packet->detail->return_date,
        ]);
    }
}
