<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable =
        ['transaction_id','bank_id','nominal','status_id'];

    public function getDateUpdate(){
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('l, d M Y');
    }
    public function status(){
        return $this->belongsTo('App\StatusMaster','status_id','id');
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
