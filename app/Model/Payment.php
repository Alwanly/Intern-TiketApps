<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function bank(){
        return $this->belongsTo('App\BankMaster');
    }

    public function transaction(){
        return $this->belongsTo('App\Transaction');
    }

    public function paymentConfirm(){
        return $this->hasOne('App\PaymentConfirm');
    }
}
