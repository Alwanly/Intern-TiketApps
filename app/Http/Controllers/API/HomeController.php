<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\UmrohPacket;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        $packet = UmrohPacket::whereHas('category',function (Builder $query){
            $query->where('category_name','=','promo');
        })->where('status_id',2)->with('price')->with('category')->limit(3)->get();

//      ?  return response()->json([$packet]);
        return response()->json([
            'id'=>$packet[0]->id,
            'packet_title'=>$packet[0]->packet_title,
            'packet_desc'=>$packet[0]->packet_desc,
            'path_bannerpacket'=>asset('Storage/bannerPacket/'.$packet[0]->path_bannerpacket),
            'category'=>$packet[0]->category,
            'airline'=>$packet[0]->airline,
            'prices'=>$packet[0]->price[0]->room,
            'detail' => $packet[0]->detail
        ]);
    }
}
