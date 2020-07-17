<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class UmrohPacketDetail extends Model
{
    protected $table = 'umroh_packet_details';

    protected $fillable=
        ['packet_id','manasik_date','takeoff_date','return_date','duration','quota','note'];

    public function packet(){
        return $this->belongsTo('App\UmrohPacket','packet_id','id');
    }

    public function getDateManasik(){
        return Carbon::parse($this->attributes['manasik_date'])->translatedFormat('l, d M Y');
    }

    public function getDateTakeoff(){
        return Carbon::parse($this->attributes['takeoff_date'])->translatedFormat('l, d M Y');
    }
    public function getDateReturn(){
        return Carbon::parse($this->attributes['return_date'])->translatedFormat('l, d M Y');
    }

}
