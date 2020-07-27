<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\UmrohPacket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $packet = UmrohPacket::whereHas('category',function (Builder $query){
            $query->where('category_name','=','promo');
        })->where('status_id',2)->limit(3)->get();

        $packet = DB::table('room_types as rt')
            ->rightJoin('prices as pr',function ($join){
                $join->on('rt.id', '=' ,'pr.room_id');
            })
            ->join('umroh_packets as up', function ($join){
                $join->on('up.id','=','pr.packet_id')
                    ->where('up.status_id','=',2)
                    ->where('category_id','=',2)
                    ->orderBy('up.created_at','desc');
            })
            ->join('umroh_packet_details as upd','up.id','=','upd.packet_id')
            ->selectRaw('upd.packet_id as id ,up.path_bannerpacket,up.packet_title, MIN(rt.room_price) as room_price,upd.takeoff_date')
            ->groupBy('upd.packet_id')
            ->limit(3)
            ->get();
        return view('user.home',[
            'packets' => $packet
        ]);
    }

    public function show(){

        $packet = UmrohPacket::whereHas('category',function (Builder $query){
            $query->where('category_name','=','promo');
        })->where('status_id',2)->limit(3)->get();

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
            ->paginate(9);
        return view('user.listProduct',[
            'packets' => $packet
        ]);
    }
    public function detail($id){
        $packet = UmrohPacket::find($id);
        return view ('user.detailProduct',['packet'=>$packet]);
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
        return view('user.listProduct',[
            'packets' => $packet
        ]);
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
            ->paginate(9);

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
            ->paginate(9);

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
            ->paginate(9);

        return $packet;
    }

    private function getSortByDate(Request $request)
    {
        $date_now = Carbon::now()->toDateString();
        $date_add3Mont = Carbon::now()->addMonth(3)->toDateString();
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
            ->whereBetween('takeoff_date',[$date_now,$date_add3Mont])
            ->orderBy('takeoff_date','asc')
            ->paginate(9);
        return $packet;
    }
}
