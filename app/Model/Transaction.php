<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'payment';

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function packet(){
        return $this->belongsTo('App\UmrohPacket');
    }

    public function transactionDetail(){
        return $this->hasMany('App\TransactionDetail');
    }
}
