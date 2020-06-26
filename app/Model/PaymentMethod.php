<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function bank(){
        return $this->hasMany('App\BankMaster');
    }
}
