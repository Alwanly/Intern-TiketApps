<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use App\RoomType;
use App\UmrohPacket;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        $packet = UmrohPacket::
        where('category_id',2)
            ->where('status_id',2)
            ->with(['price' => function($q)
                {$q->select(['id','room_id','packet_id']);
                $q->with(['room' => function($q)
                    {$q->select(['id','room_name','room_price','room_capacity']);}]);}])
            ->with(['detail'=>function($q){
                $q->select(['id','packet_id','takeoff_date']);
            }])
            ->limit(3)->get();
        $packet->makeHidden(['category_id','airline_id','status_id','created_at','updated_at']);

//        $packet = UmrohPacket::where('category_id',2)
//            ->where('status_id',2)
//            ->limit(3)
//            ->get();
//        $data =[];
//        foreach ($packet[0]->price as $pr){
//            $data = $pr;
//        }

//        $packet = UmrohPacket::select('*')->leftjoin('prices','umroh_packets.id','=','prices.packet_id')
//            ->leftjoin('room_types','prices.room_id','=','room_types.id')
//            ->limit(3)
//            ->get();
//        $packet = RoomType::select('*')
//            ->leftjoin('prices','prices.room_id','=','room_types.id')
//            ->leftjoin('umroh_packets','umroh_packets.id','=','prices.packet_id')
//            ->where('umroh_packets.status_id','2')
//            ->limit(3)
//            ->get();

//      ?  return response()->json([$packet]);
        return response()->json($packet,200);
    }

    public function packet(){
        $packet = UmrohPacket::
        where('category_id',2)
            ->where('status_id',2)
            ->with(['price' => function($q)
            {$q->select(['id','room_id','packet_id']);
                $q->with(['room' => function($q)
                {$q->select(['id','room_name','room_price','room_capacity']);}]);}])
            ->with(['detail'=>function($q){
                $q->select(['id','packet_id','takeoff_date']);
            }])
            ->get();
        $packet->makeHidden(['category_id','airline_id','status_id','created_at','updated_at']);
        return response()->json($packet,200);
    }
    public function packetById($id){
        $packet = UmrohPacket::
        where('id',$id)
            ->where('category_id',2)
            ->where('status_id',2)
            ->with(['price' => function($q)
            {$q->select(['id','room_id','packet_id']);
                $q->with(['room' => function($q)
                {$q->select(['id','room_name','room_price','room_capacity']);}]);}])
            ->with(['detail'=>function($q){
                $q->select(['id','packet_id','takeoff_date','manasik_date','return_date','duration','quota','note']);
            }])
            ->with(['airline'=>function($q){
                $q->select(['id','airlines_name']);
            }])
            ->get();
        $packet->makeHidden(['category_id','airline_id','status_id','created_at','updated_at']);
        return response()->json($packet,200);
    }
}
