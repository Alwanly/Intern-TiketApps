<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentConfirm extends Model
{
    protected $table ='payment_confirms';
    protected $fillable =
        ['payment_id','bank_id','norekening','rekening_name','path_photoproof','status_id'];
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function payment(){
        return $this->belongsTo('App\Payment');
    }
    public function bank(){
        return $this->belongsTo('App\BankMaster');
    }
}
