<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{

    public function index (){
        return view('admin.dashboard');
    }

    public function packet(){
        return view('admin.packetumroh.packetList');
    }

    public function detailPacket(Request $request){
        return view('admin.packetumroh.packetDetail');
    }

    public function createPacket(){
        return view('admin.packetumroh.packetCreate');
    }

    public function indexAgent(){
        return view('admin.agents.agentLists');
    }

    public function detailAgent(){
        return view('admin.agents.agentDetail');
    }
}
