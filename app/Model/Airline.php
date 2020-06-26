<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $table ='airlines';
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }
    public function packet(){
        return $this->hasMany('App\UmrohPacket');
    }
}
