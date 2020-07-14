<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankMaster extends Model
{
    protected $table ='bank_masters';
    protected $fillable =
        ['method_id','bank_code','bank_name','status_id'];
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function method(){
        return $this->belongsTo('App\PaymentMethod','method_id','id');
    }

    public function rekening(){
        return $this->hasMany('App\RekeningMaster','bank_id','id');
    }

    public function payment(){
        return $this->hasMany('App\Payment');
    }
}
