<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $table ='airlines';
    protected $fillable = ['airlines_name','status_id'];
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }
    public function packet(){
        return $this->hasMany('App\UmrohPacket');
    }
}
