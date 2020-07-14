<?php

namespace App\Http\Controllers\Admin;


use App\Transaction;
use App\UmrohPacket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{

    public function index (){
        $packet = UmrohPacket::where('status_id',2)->get();
        $packet = count($packet);

        $tr = Transaction::all();
        $tr = count($tr);


        return view('admin.dashboard',[
            'packet'=>$packet,
            'tr'=>$tr
        ]);
    }


    public function indexAgent(){
        return view('admin.agents.agentLists');
    }

    public function detailAgent(){
        return view('admin.agents.agentDetail');
    }
}
