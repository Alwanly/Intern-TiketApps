<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }
    public function packet(){
        return $this->belongsTo('App\UmrohPacket');
    }
    public function roomType(){
        return $this->belongsTo('App\RoomType');
    }
}
