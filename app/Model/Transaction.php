<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable=[
        'user_id','packet_id','price_id','status_id','code_agent'
    ];

    public function getDateCreate(){
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d M Y');
    }
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function packet(){
        return $this->belongsTo('App\UmrohPacket');
    }

    public function detail(){
        return $this->hasMany('App\TransactionDetail');
    }

    public function price(){
        return $this->hasOne('App\Price','id','price_id');
    }

    public function payment(){
        return $this->hasOne('App\Payment');
    }
}
