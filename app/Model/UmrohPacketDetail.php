<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UmrohPacketDetail extends Model
{
    protected $table = 'umroh_packet_details';

    public function packet(){
        return $this->belongsTo('App\UmrohPacket');
    }
}
