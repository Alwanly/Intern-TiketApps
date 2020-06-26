<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankMaster extends Model
{
    protected $table ='bank_masters';
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function paymentMethod(){
        return $this->belongsTo('App\PaymentMethod');
    }

    public function rekening(){
        return $this->hasMany('App\RekeningMaster');
    }

    public function payment(){
        return $this->hasMany('App\Payment');
    }
}
