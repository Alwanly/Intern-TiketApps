<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use App\RoomType;
use App\UmrohPacket;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function getImagePacket(Request $image){

        return response()->json(['image'=>asset('storage/bannerPacket/'.$image->image)]);
    }

    public function packetBySearchAndSorting(Request $request){

        $typeSearch = $request->type;
        $packet = null;
        if ($request->has('name')){
            $packet = $this->getPacketByName($request);
        }
        if ($request->has('takeoff_date_start')){
            $packet = $this->getPacketByDate($request);
        }
        return response()->json($packet,200);
    }

    private function getPacketByName($request)
    {

        $name = $request->name;
        $packet = UmrohPacket::
        where('category_id',2)
            ->where('status_id',2)
            ->with(['price' => function($q)
            {$q->select(['id','room_id','packet_id']);
                $q->with(['room' => function($q)
                {$q->select(['id','room_name','room_price','room_capacity']);}]);}])
            ->with(['detail'=>function($q){
                $q->select(['id','packet_id','takeoff_date']);
            }])->where('packet_title','like','%'.$name.'%')
            ->get();
        $packet->makeHidden(['category_id','airline_id','status_id','created_at','updated_at']);

        return $packet;
    }

    private function getPacketByDate(Request $request)
    {

        $date_start = $request->takeoff_date_start;
        $date_end = $request->takeoff_date_end;
        $packet = UmrohPacket::
            whereHas('detail',function (Builder $q) use ($date_start,$date_end){
                $q->whereBetween('takeoff_date',[$date_start,$date_end]);
        })->
        where('category_id',2)
            ->where('status_id',2)
            ->with(['price' => function($q)
            {$q->select(['id','room_id','packet_id']);
                $q->with(['room' => function($q)
                {$q->select(['id','room_name','room_price','room_capacity']);}]);}])
            ->with(['detail'=>function($q) use ($date_start,$date_end){
                $q->select(['id','packet_id','takeoff_date']);
            }])->orderByJoin('detail.takeoff_date','asc')
            ->get();
        $packet->makeHidden(['category_id','airline_id','status_id','created_at','updated_at']);

//        $packet = DB::table('umroh_packets as up')
//            ->join('umroh_packet_details as upd','up.id','=','upd.packet_id')
//            ->join('prices as pr','up.id','=','pr.packet_id')
//            ->join('room_types as rp',function ($join){
//                $join->on('rp.id','=','pr.room_id');
//                $join->min('rp.room_price');
//            })
//            ->get();
        return $packet;
    }
}
