<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\UmrohPacket;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{

    public function index()
    {
        $packet = UmrohPacket::whereHas('category',function (Builder $query){
            $query->where('category_name','=','promo');
            $query->where('status_id',2);
        })->limit(3)->get();
        return view('user.home',[
            'packets' => $packet
        ]);
    }

    public function show(){
        $packet = UmrohPacket::where('status_id','2')->paginate(9);
        return view('user.listProduct',[
            'packets' => $packet
        ]);
    }
    public function detail($id){
        $packet = UmrohPacket::find($id);
        return view ('user.detailProduct',['packet'=>$packet]);
    }
}
