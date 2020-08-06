<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class UmrohPacket extends Model
{
    protected $table='umroh_packets';
//    protected $hidden = ['category_id','airline_id','status_id','created_at','updated_at'];

    protected $fillable =
        ['path_bannerpacket','packet_title','packet_desc','category_id','airline_id','status_id'];


    public function getDateCreate(){
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function detail(){
        return $this->hasOne('App\UmrohPacketDetail','packet_id');
    }

    public function transaction(){
        return $this->hasMany('App\Transaction','packet_id');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function airline(){
        return $this->belongsTo('App\Airline');
    }

    public function price(){
        return $this->hasMany('App\Price','packet_id','id');
    }
}
