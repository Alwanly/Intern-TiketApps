<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';

//    protected $hidden = ['packet_id','room_id','status_id','created_at','updated_at'];

    protected $fillable=
        ['packet_id','room_id','status_id'];

    public function status(){
        return $this->belongsTo('App\StatusMaster','status_id','id');
    }
    public function packet(){
        return $this->belongsTo('App\UmrohPacket','packet_id','id');
    }
    public function room(){
        return $this->belongsTo('App\RoomType','room_id','id');
    }

    public function transaction(){
        return $this->belongsTo('App\Transaction','id','id');
    }
}
