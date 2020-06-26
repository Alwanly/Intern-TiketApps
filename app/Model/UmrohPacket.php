<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UmrohPacket extends Model
{
    protected $table='umroh_packets';

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function packetDetail(){
        return $this->hasOne('App\UmrohPacketDetail');

    }

    public function transaction(){
        return $this->hasMany('App\Transaction');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function airline(){
        return $this->belongsTo('App\Airline');
    }
}
