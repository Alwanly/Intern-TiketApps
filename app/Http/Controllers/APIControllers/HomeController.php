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
        
        $packet = DB::table('room_types as rt')
            ->rightJoin('prices as pr','rt.id', '=' ,'pr.room_id')
            ->join('umroh_packets as up', function ($join){
                $join->on('up.id','=','pr.packet_id')
                    ->where('up.status_id','=',2)
                    ->where('category_id','=',2)
                    ->orderBy('up.created_at','desc');

            })
            ->selectRaw("up.id,up.path_bannerpacket,up.packet_title")
            ->groupBy('up.id')
            ->limit(3)
            ->get();
        return response()->json($packet,200);
    }

    public function packet(){
        $packet = DB::table('room_types as rt')
            ->rightJoin('prices as pr',function ($join){
                $join->on('rt.id', '=' ,'pr.room_id');
            })
            ->join('umroh_packets as up', function ($join){
                $join->on('up.id','=','pr.packet_id')
                    ->where('up.status_id','=',2)
                    ->orderBy('up.created_at','desc');
            })
            ->join('umroh_packet_details as upd','up.id','=','upd.packet_id')
            ->selectRaw('upd.packet_id as id ,up.path_bannerpacket,up.packet_title, MIN(rt.room_price) as room_price,upd.takeoff_date')
            ->groupBy('upd.packet_id')
            ->get();
        return response()->json($packet,200);
    }

    public function packetById($id){
        $packet = UmrohPacket::
        where('id',$id)
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

    public function packetBySearchAndSorting(Request $request){

        $packet = null;
        if ($request->type == 'search'){
            if ($request->has('name')) $packet = $this->getPacketByName($request);
            if ($request->has('date')) $packet = $this->getPacketByDate($request);
        }
        if ($request->type == 'sort'){
            if ($request->has('price')) $packet = $this->getSortByPrice($request);
            if ($request->has('date')) $packet = $this->getSortByDate($request);
        }
        return response()->json($packet,200);
    }

    private function getPacketByName($request)
    {
        $name = $request->name;
        $packet = DB::table('room_types as rt')
            ->rightJoin('prices as pr',function ($join){
                $join->on('rt.id', '=' ,'pr.room_id');
            })
            ->join('umroh_packets as up', function ($join){
                $join->on('up.id','=','pr.packet_id')
                    ->where('up.status_id','=',2);
            })
            ->join('umroh_packet_details as upd','up.id','=','upd.packet_id')
            ->selectRaw('upd.packet_id as id ,up.path_bannerpacket,up.packet_title, MIN(rt.room_price) as room_price,upd.takeoff_date')
            ->groupBy('upd.packet_id')
            ->where('up.packet_title','like','%'.$name.'%')
            ->get();

        return $packet;
    }

    private function getPacketByDate(Request $request)
    {

        $date = $request->date;
        $packet = DB::table('room_types as rt')
            ->rightJoin('prices as pr',function ($join){
                $join->on('rt.id', '=' ,'pr.room_id');
            })
            ->join('umroh_packets as up', function ($join){
                $join->on('up.id','=','pr.packet_id')
                    ->where('up.status_id','=',2);
            })
            ->join('umroh_packet_details as upd','up.id','=','upd.packet_id')
            ->selectRaw('upd.packet_id as id ,up.path_bannerpacket,up.packet_title, MIN(rt.room_price) as room_price,upd.takeoff_date')
            ->groupBy('upd.packet_id')
            ->where('upd.takeoff_date','=',$date)
            ->get();

        return $packet;
    }

    private function getSortByPrice(Request $request)
    {

        $price = $request->price;
        $packet = DB::table('room_types as rt')
            ->rightJoin('prices as pr',function ($join){
                $join->on('rt.id', '=' ,'pr.room_id');
            })
            ->join('umroh_packets as up', function ($join){
                $join->on('up.id','=','pr.packet_id')
                    ->where('up.status_id','=',2);
            })
            ->join('umroh_packet_details as upd','up.id','=','upd.packet_id')
            ->selectRaw('upd.packet_id as id ,up.path_bannerpacket,up.packet_title, MIN(rt.room_price) as room_price,upd.takeoff_date')
            ->groupBy('upd.packet_id')
            ->orderBy('room_price',$price)
            ->get();

        return $packet;
    }

    private function getSortByDate(Request $request)
    {
        $date = $request->date;
        $packet = DB::table('room_types as rt')
            ->rightJoin('prices as pr',function ($join){
                $join->on('rt.id', '=' ,'pr.room_id');
            })
            ->join('umroh_packets as up', function ($join){
                $join->on('up.id','=','pr.packet_id')
                    ->where('up.status_id','=',2);
            })
            ->join('umroh_packet_details as upd','up.id','=','upd.packet_id')
            ->selectRaw('upd.packet_id as id ,up.path_bannerpacket,up.packet_title, MIN(rt.room_price) as room_price,upd.takeoff_date')
            ->groupBy('upd.packet_id')
            ->orderBy('takeoff_date',$date)
            ->get();

        return $packet;
    }
}
