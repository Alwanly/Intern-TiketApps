<?php

namespace App\Http\Controllers\Admin;

use App\Airline;
use App\Category;
use App\Http\Controllers\Controller;
use App\Price;
use App\RoomType;
use App\StatusMaster;
use App\UmrohPacket;
use App\UmrohPacketDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PacketUmrohController extends Controller
{
    public function index(){
        $packets = UmrohPacket::paginate(10);
        return view('admin.packetumroh.packetList',[
            'packets'=>$packets
        ]);
    }

    public function detail($id){
        $packets = UmrohPacket::find($id);
        $status = StatusMaster::where('status_code',"status_active")->get();

        return view('admin.packetumroh.packetDetail',[
            'packets' => $packets,
            'status'=>$status
        ]);
    }

    public function create(){
        $status_id = 2;
        $rooms = RoomType::where('status_id',$status_id)->get();
        $categories = Category::where('status_id',$status_id)->get();
        $status = StatusMaster::where('status_code',"sa")->get();
        $airlines= Airline::where('status_id',$status_id)->get();

        return view('admin.packetumroh.packetCreate',[
                'rooms'=>$rooms,
                'categories' =>$categories,
                'status'=>$status,
                'airlines' =>$airlines
            ]
        );
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'banner' => 'required|file',
            'packet_title' => 'required',
            'packet_desc' => 'required',
            'manasik_date' => 'required|date',
            'takeoff_date' => 'required|date',
            'return_date' => 'required|date',
            'room_id' => 'required|not_in:0',
            'category_id' => 'required',
            'duration' => 'required',
            'quota' => 'required',
        ]);

        $file = $request->file('banner');
        $title = str_replace(' ','_',$request->packet_title);
        $fileName = Carbon::now()->toDateString().'_'.$title.'.'.$file->getClientOriginalExtension();
        $path = 'storage/bannerPacket';
        $status = Storage::disk('banner_packet')->exists($fileName);
        if ($status){
            $request->session()->flash('status',false);
            $request->session()->flash('message','error Create Data');
            return redirect()->back();
        }
        $file->move($path,$fileName);
        $nameBanner = asset('storage/bannerPacket/'.$fileName);
        $packet_id = UmrohPacket::create([
            'path_bannerpacket' => $nameBanner,
            'packet_title'=>$request->packet_title,
            'packet_desc'=>$request->packet_desc,
            'category_id'=>$request->category_id,
            'airline_id'=>$request->airline_id,
            'status_id' => $request->status_id
        ])->id;

        UmrohPacketDetail::create([
            'packet_id'=>$packet_id,
            'manasik_date'=>$request->manasik_date,
            'takeoff_date'=>$request->takeoff_date,
            'return_date'=>$request->return_date,
            'duration'=>$request->duration,
            'quota'=>$request->quota,
            'note'=>$request->note
        ]);

        $rooms = $request->room_id;
        for ($i = 0 ; $i< count($rooms); $i++){
            Price::create([
                'packet_id'=>$packet_id,
                'room_id' => $rooms[$i],
                'status_id'=>2
            ]);
        }
        $request->session()->flash('status',true);
        $request->session()->flash('message','Successfully Create Data');

        return redirect()->back();
    }

    public function update($id, Request $request){
        $packet = UmrohPacket::find($id)->update([
            'status_id'=>$request->status_id
        ]);

        if (!$packet){
            $request->session()->flash('status',false);
            $request->session()->flash('message','Error Updates Data');
            return redirect()->route('masterData');
        }
        $request->session()->flash('status',true);
        $request->session()->flash('message','Successfully Updates Data');

        return redirect()->route('packetList');
    }
}
