<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentConfirm extends Model
{
    protected $table ='payment_confirms';

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function payment(){
        return $this->belongsTo('App\Payment');
    }
}
