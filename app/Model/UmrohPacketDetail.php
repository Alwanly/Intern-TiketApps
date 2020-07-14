<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UmrohPacketDetail extends Model
{
    protected $table = 'umroh_packet_details';

    protected $fillable=
        ['packet_id','manasik_date','takeoff_date','return_date','duration','quota','note'];

    public function packet(){
        return $this->belongsTo('App\UmrohPacket','packet_id','id');
    }
}
